<?php 
class Crud extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('crud');
    }


    // Controller function to add new project
    public function addProject(){
        // Input field validation
        $this->form_validation->set_rules('project', 'Project', 'trim|required');
        $this->form_validation->set_rules('assignee', 'Assignee', 'trim|required');
        $this->form_validation->set_rules('priority', 'Priority', 'trim|required');
        $this->form_validation->set_rules('budget', 'Budget', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails
            $data['validation_errors'] = validation_errors();
            $this->load->view('crud', $data);
        } else {
            // If validation succeed
        $data = array(
            'project' => $this->input->post('project'),
            'assignee' => $this->input->post('assignee'),
            'priority' => $this->input->post('priority'),
            'budget' => $this->input->post('budget')
        );
        // insertProject function from project model
        $result = $this->project->insertProject($data);
        if($result){
            $this->session->set_flashdata('msg', 'Project Added.');
            redirect('crud');
        }
    }
        
    }

    // Controller function to display/search projects
    public function displayProjects(){
        $value = $this->input->get('q');
        $data['projects'] = $this->project->showProject($value);
        $this->load->view('partials/project_table',$data);
    }

    // Controller function to delete project
    public function delete(){
        $value = $this->input->get('q');
        $result = $this->project->deleteProject($value);
        if($result){
            $this->session->set_flashdata('deleted', 'Project deleted.');
            redirect('crud');
        }
    }

    public function editProject(){
        $this->form_validation->set_rules('project', 'Project', 'trim|required');
        $this->form_validation->set_rules('assignee', 'Assignee', 'trim|required');
        $this->form_validation->set_rules('priority', 'Priority', 'trim|required');
        $this->form_validation->set_rules('budget', 'Budget', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) { 
            $data['update_error'] = validation_errors();
            $this->load->view('crud', $data);
        } else {
        $ID = $this->input->post('id');
        $data = array(
            'project' => $this->input->post('project'),
            'assignee' => $this->input->post('assignee'),
            'priority' => $this->input->post('priority'),
            'budget' => $this->input->post('budget'),
        );
        $result = $this->project->updateProject($data, $ID);
        if($result){
            $this->session->set_flashdata('updated', 'Project updated.');
            redirect('crud');
        }
    }
}

    
}


?>