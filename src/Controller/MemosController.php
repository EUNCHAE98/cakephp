<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\FlashComponent;
use Cake\I18n\Date;
use Cake\I18n\Time; 
/**
 * Memos Controller
 *
 * @property \App\Model\Table\MemosTable $Memos
 *
 * @method \App\Model\Entity\Memo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MemosController extends AppController
{
    private $conn = null;

    public function initialize(){
        
        $this->conn = ConnectionManager::get('default');
        $this->loadComponent('Flash');
        // parent::initialize();
        $this->name = "Memos";
        $this->autoRender = false;
    }

    public function index() {
        try{
            // $memos = $conn->execute('SELECT * FROM memos')
            //                         ->fetchAll('assoc');

            $memos = $this->conn->newQuery()
                                ->select('*')
                                ->from('memos')
                                ->execute()
                                ->fetchAll('assoc');
            
            $this->autoRender = true;
            $this->set('memos', $memos);
            $this->set('_serialize', ['memos']);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id = null) {
        if ($this->request->is('post')) {
            if (!$this->request->getData()['id']
             || !$this->request->getData()['content'])  {
                $this->Flash->error(__('No Id or Content!'));
                return $this->redirect(['action' => 'index']);
            }

        $id = $this->request->getData()['id'];
        $content = $this->request->getData()['content'];
        
        $date = date("Y-m-d H:i:s");

        $query = $this->conn->newQuery();
        $query->update('memos')
              ->set(['content' => $content, 'modified' => $date])
              ->where(['id' => $id]);
        $stmt = $query->execute();

        $this->Flash->success(__('Memo Update! {0}', $id));
    return $this->redirect(['action' => 'index']);
    } else {
        $memo = $this->conn->newQuery()
                            ->select('*')
                            ->from('memos')
                            ->where(['id' => $id])
                            ->execute()
                            ->fetch('assoc');

        $this->set('memo', $memo);
        $this->set('_serialize', ['memo']);
    }

    $this->autoRender = true;
}

    public function add() {
        if ($this->request->is('post')) {
            if (!$this->request->getData()['content']) {
                $this->Flash->error(__('No Id or Content!'));
                return $this->redirect(['action' => 'add']);
            }

            $stmt = $this->conn->insert('memos', ['content' =>
                    $this->request->getData()['content']]);
            $id = $stmt->lastInsertId('id');

            if($id) {
                $this->Flash->success(__('New Memo upload! {0}', $id));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error!'));
        }
        $this->autoRender = true;
    }

    public function delete($id = null) {

        if ($id == null) {
            $this->Flash->error(__('No id！'));
            return $this->redirect(['action' => 'index']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $this->conn->delete('memos', ['id' => $id]);

        $this->Flash->success(__('Delete memo!'));
        return $this->redirect(['action' => 'index']);

    }
}
