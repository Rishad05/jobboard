<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MY_Controller
{
    function __construct() {
        parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->model('home_model'); 
        $this->load->model('jobs_model'); 
        $this->load->model('event'); 
    }
    function index($year = NULL, $month = NULL) {  


        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['services'] = $this->home_model->homeServices();
        $this->data['clients'] = $this->site->whereRows('company','status',1,'ASC');
        $this->data['testimonials'] = $this->site->whereRows('testimonials','status',1, 'ASC');
        $this->data['recent_news'] = $this->home_model->recent_news();
        $this->data['trainings'] = $this->home_model->trainings();
        $this->data['jobs'] = $this->home_model->jobs();

        $this->data['tickerValues'] = $this->home_model->getTickerValues(); 
        $this->data['tickerValueJob']  = $this->home_model->getJobsForTicker();   
        
        $this->data['page_title'] = 'Home Page';
        if (!$year) { $year = date('Y'); }
        if (!$month) { $month = date('m'); }
        //$this->data['eventCalendar'] = $this->eventCalendar(); 
        $this->data['eventCalendar'] = $this->event_calender(); 
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error'); 
        //$sales = $this->reports_model->getDailySales($year, $month,$store_id);
        $bc = array(array('link' => '#', 'page' => 'Home Page'));
        $meta = array('page_title' => 'Home Page', 'bc' => $bc);		
       	$this->frontend_construct('home_page', $this->data, $meta);		
    }

    function pages(){ 
       
        //$this->data['info'] = $this->site->wheres_row('general_page', array('slug_name'=>$this->uri->segment(2))); 
        $this->data['info'] = $this->site->wheres_row('menus', array('slug'=>$this->uri->segment(2))); 

        $this->data['page_title'] = 'pages';
        $bc = array(array('link' => '#', 'page' => 'pages'));
        $meta = array('page_title' => 'pages', 'bc' => $bc); 
        $this->frontend_construct('gpage', $this->data, $meta);
    }
    function event_calender($year=NULL, $month=NULL){
        if (!$year) { $year = date('Y'); }
        if (!$month) { $month = date('m'); }
        $this->lang->load('calendar');
        $config = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => site_url('home/event_calender/'),
            'month_type' => 'long',
            'day_type' => 'short'
            );
        $config['template'] = '

            {table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered" style="min-width:522px;">{/table_open}

            {heading_row_start}<tr class="active">{/heading_row_start}

            {heading_previous_cell}<th><div class="text-center"><a href="{previous_url}">&lt;&lt;</div></a></th>{/heading_previous_cell}
            {heading_title_cell}<th colspan="{colspan}"><div class="text-center">{heading}</div></th>{/heading_title_cell}
            {heading_next_cell}<th><div class="text-center"><a href="{next_url}">&gt;&gt;</a></div></th>{/heading_next_cell}

            {heading_row_end}</tr>{/heading_row_end}

            {week_row_start}<tr>{/week_row_start}
            {week_day_cell}<td class="cl_equal"><div class="cl_wday">{week_day}</div></td>{/week_day_cell}
            {week_row_end}</tr>{/week_row_end}

            {cal_row_start}<tr>{/cal_row_start}
            {cal_cell_start}<td>{/cal_cell_start}

            {cal_cell_content}<div class="cl_left">{day}</div><div class="cl_right">{content}</div>{/cal_cell_content}
            {cal_cell_content_today}<div class="cl_left highlight">{day}</div><div class="cl_right">{content}</div>{/cal_cell_content_today}

            {cal_cell_no_content}{day}{/cal_cell_no_content}
            {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

            {cal_cell_blank}&nbsp;{/cal_cell_blank}

            {cal_cell_end}</td>{/cal_cell_end}
            {cal_row_end}</tr>{/cal_row_end}

            {table_close}</table>{/table_close} ';

        $this->load->library('calendar', $config);
        $trainings = $this->home_model->eventCalender($year, $month); 
        
        if(!empty($trainings)) {
            foreach($trainings as $training){
                $daily_sale[$training->start_date] = "<div class='cal_hvr'><a href='".base_url('training/details/'.$training->slug)."'>". $training->title."</a></div>";
            }
        } else {
            $daily_sale = array();
        } 
        return  $this->calendar->generate($year, $month, $daily_sale);
    }
    public function eventCalendar($year = '', $month = ''){ 
        $data = array(); 
         
        $dateYear = ($year != '')?$year:date("Y"); 
        $dateMonth = ($month != '')?$month:date("m"); 
        $date = $dateYear.'-'.$dateMonth.'-01'; 
        $currentMonthFirstDay = date("N", strtotime($date)); 
        $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear); 
        $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay); 
        $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42; 
         
        $con = array( 
            'where' => array( 
                'status' => 1 
            ), 
            'where_year' => $dateYear, 
            'where_month' => $dateMonth 
        ); 
        $data['events'] = $this->event->getGroupCount($con); 
         
        $data['calendar'] = array( 
            'dateYear' => $dateYear, 
            'dateMonth' => $dateMonth, 
            'date' => $date, 
            'currentMonthFirstDay' => $currentMonthFirstDay, 
            'totalDaysOfMonthDisplay' => $totalDaysOfMonthDisplay, 
            'boxDisplay' => $boxDisplay 
        ); 
         
        $data['monthOptions'] = $this->getMonths($dateMonth); 
        $data['yearOptions'] = $this->getYears($dateYear); 
 
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){ 
            $this->load->view($this->frontend_theme .'/event-cal', $data); 
        }else{ 
            return $this->load->view($this->frontend_theme .'/event-cal', $data, true); 
        } 
    } 
     
    /* 
     * Generate months options list for select box 
     */ 
    function getMonths($selected = ''){ 
        $options = ''; 
        for($i=1;$i<=12;$i++) 
        { 
            $value = ($i < 10)?'0'.$i:$i; 
            $selectedOpt = ($value == $selected)?'selected':''; 
            $options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>'; 
        } 
        return $options; 
    } 
    
    /* 
     * Generate years options list for select box 
     */ 
    function getYears($selected = ''){ 
        $options = ''; 
        for($i=2019;$i<=2025;$i++) 
        { 
            $selectedOpt = ($i == $selected)?'selected':''; 
            $options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>'; 
        } 
        return $options; 
    } 
    
    /* 
     * Generate events list in HTML format 
     */ 
    function getEvents($date = ''){ 
        $eventListHTML = ''; 
        $date = $date?$date:date("Y-m-d"); 
         
        // Fetch events based on the specific date 
        $con = array( 
            'where' => array( 
                'start_date' => $date, 
                'status' => 1 
            ) 
        ); 
        $events = $this->event->getRows($con);  
        //$events  = $this->home_model->eventCalender($year, $month); 
 
        if(!empty($events)){ 
            $eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>'; 
            $eventListHTML .= '<ul>'; 
            foreach($events as $row){  
                $eventListHTML .= '<li> <a href="'.base_url('training/details/'.$row['slug']).'">'.$row['title'].'</a></li>'; 
            } 
            $eventListHTML .= '</ul>'; 
        } 
        echo $eventListHTML; 
    } 

    function gallery($gid = 0, $offset = 0)
	{ 
        $this->load->library('pagination');

        $config['base_url'] = site_url('home/gallery/'.$gid.'/');

        $config['suffix'] = ''; 
        
        $config['total_rows'] = $this->home_model->count_image($gid);

        $config['per_page'] = 20;

        $config['uri_segment'] = 4;

        $config['full_tag_open'] = '<ul class="pagination">';

        $config['full_tag_close'] = '</ul>';

        $this->pagination->initialize($config);

        $this->data['links'] = $this->pagination->create_links();  

        $this->data['images'] = $this->home_model->getAlbumImage($config['per_page'], $offset, $gid);

        $this->data['gid'] = $gid ;
        $gid = $this->input->get('album') ? $this->input->get('album') : NULL; 

        $this->data['album'] = $this->home_model->getAlbum();
        //$this->data['images'] = $this->home_model->getAlbumImage($gid);
        $this->data['page_title'] = 'Gallery';
        $bc = array(array('link' => '#', 'page' => 'Gallery'));
        $meta = array('page_title' => 'Gallery', 'bc' => $bc); 
       	$this->frontend_construct('pages/gallery', $this->data, $meta); 
    }

    function news()
	{ 
        $this->data['info'] = $this->site->wheres_rows('news', array('status'=>1, 'trash_status'=>0));
        $this->data['page_title'] = 'News & Event';
        $bc = array(array('link' => '#', 'page' => 'News & Event'));
        $meta = array('page_title' => 'News & Event', 'bc' => $bc);
		
       	$this->frontend_construct('news/news_data', $this->data, $meta); 
    }

    function news_details($id)
	{   

        $this->data['info'] = $this->site->wheres_row('news', array('id'=>$id));
        $this->data['page_title'] = 'News & Event';
        $bc = array(array('link' => '#', 'page' => 'News & Event'));
        $meta = array('page_title' => 'News & Event', 'bc' => $bc);
		
       	$this->frontend_construct('news/news_details', $this->data, $meta); 
    }

    function history()
	{ 
        $this->data['info'] = $this->site->wheres_row('general_page', array('slug_name'=>'history')); 
        $this->data['page_title'] = 'BOS History';
        $bc = array(array('link' => '#', 'page' => 'BOS History'));
        $meta = array('page_title' => 'BOS History', 'bc' => $bc);
		
       	$this->frontend_construct('pages/history', $this->data, $meta); 
    }
	

	function publication($offset = 0)
	{
        $year = $this->input->post('publication_year') ? $this->input->post('publication_year') : NULL;
        $this->load->library('pagination');

        $config['base_url'] = site_url('home/publication/');

        $config['suffix'] = ''; 
        
        $config['total_rows'] = $this->home_model->count_journals($year);

        $config['per_page'] = 3;

        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';

        $config['full_tag_close'] = '</ul>';

        $this->pagination->initialize($config);

        $this->data['links'] = $this->pagination->create_links();  

        $this->data['info'] = $this->home_model->getJournals($config['per_page'], $offset, $year);  


        //Type 1 is publication
        //$this->data['info'] = $this->site->wheres_rows('publication', array('type'=>1));
        $this->data['years'] =  $this->home_model->publication_years();;
		$this->data['page_title'] = 'Publication';
        $bc = array(array('link' => '#', 'page' => 'Publication'));
        $meta = array('page_title' => 'Publication', 'bc' => $bc); 
       	$this->frontend_construct('pages/publication', $this->data, $meta); 
	}
    function searchpublication($keyword=NULL)
    {
        //$this->home_model->publication_search();

    }
    function viewbook($id){

        $this->data['info'] = $this->site->wheres_row('publication', array('id'=>$id));
        $this->data['page_title'] = 'Book';
        $bc = array(array('link' => '#', 'page' => 'Book'));
        $meta = array('page_title' => 'Book', 'bc' => $bc); 
        $this->frontend_construct('pages/viewbook', $this->data, $meta);
    } 

    function viewvideo(){
        $this->db->order_by('order_by', 'ASC');
        $q = $this->db->get('videos');
        if($q->num_rows() > 0 ){
            $this->data['videos'] = $q->result();
        }else{
            $this->data['videos'] = array();
        }
        //$this->data['videos'] = $this->site->wheres_rows('videos', null);
        $this->data['page_title'] = 'Book';
        $bc = array(array('link' => '#', 'page' => 'Book'));
        $meta = array('page_title' => 'Book', 'bc' => $bc); 
        $this->frontend_construct('pages/viewvideo', $this->data, $meta);
    } 

	function feedback()
	{
		$this->data['page_title'] = 'Feedback';
        $bc = array(array('link' => '#', 'page' => 'Feedback'));
        $meta = array('page_title' => 'Feedback', 'bc' => $bc);
		
       	$this->frontend_construct('pages/feedback', $this->data, $meta); 
	}

	function bookcorner()
	{
		$this->data['page_title'] = 'Book Corner';
        $bc = array(array('link' => '#', 'page' => 'Book Corner'));
        $meta = array('page_title' => 'Book Corner', 'bc' => $bc);
		
       	$this->frontend_construct('pages/bookcorner', $this->data, $meta); 
	} 
     

   
    function lifetimemember($offset = 0)
    { 
        $this->load->library('pagination'); 
        $config['base_url'] = site_url('home/lifetimemember/'); 
        $config['suffix'] = '';  
        $config['total_rows'] = $this->home_model->count_lifetime_member(); 
        $config['per_page'] = 20; 
        $config['uri_segment'] = 3; 
        $config['full_tag_open'] = '<ul class="pagination">'; 
        $config['full_tag_close'] = '</ul>'; 
        $this->pagination->initialize($config); 
        $this->data['links'] = $this->pagination->create_links();   
        $this->data['lmembers'] = $this->home_model->getLifetimeMember($config['per_page'], $offset);   
        $this->data['page_title'] = 'Lifetime Members';
        $bc = array(array('link' => '#', 'page' => 'Lifetime Members'));
        $meta = array('page_title' => 'Lifetime Members', 'bc' => $bc); 
        $this->frontend_construct('member/index', $this->data, $meta); 
    }
     function gmember($offset = 0)
    {  

        $this->load->library('pagination');

        $config['base_url'] = site_url('home/gmember/');

        $config['suffix'] = ''; 
        
        $config['total_rows'] = $this->home_model->count_general_member();

        $config['per_page'] = 20;

        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';

        $config['full_tag_close'] = '</ul>';

        $this->pagination->initialize($config);

        $this->data['links'] = $this->pagination->create_links();  

        $this->data['gmembers'] = $this->home_model->getGeneralMember($config['per_page'], $offset);  
        // end pagination
        $this->data['page_title'] = 'General Members';
        $bc = array(array('link' => '#', 'page' => 'General Members'));
        $meta = array('page_title' => 'General Members', 'bc' => $bc); 
        $this->frontend_construct('member/gmember', $this->data, $meta);  
    }

    

    function event(){  

        $this->data['info'] =  $this->home_model->getevents();
         
        $this->data['page_title'] = 'Events';
        $bc = array(array('link' => '#', 'page' => 'Events'));
        $meta = array('page_title' => 'Events', 'bc' => $bc); 
        $this->frontend_construct('pages/event', $this->data, $meta); 
    }
    function event_details($id=NULL){ 
        if($id == NULL){
            redirect('events');
        }
        $this->data['info'] = $this->site->wheres_row('event', array('event_id'=>$id));
        $this->data['page_title'] = 'Event Details';
        $bc = array(array('link' => '#', 'page' => 'Event Details'));
        $meta = array('page_title' => 'Event Details', 'bc' => $bc); 
        $this->frontend_construct('pages/event_details', $this->data, $meta); 
    }
    function event_booking($id=NULL){ 
        if($id == NULL){
            redirect('events');
        }

        $this->form_validation->set_rules('name', $this->lang->line("name"), 'required');  
        $this->form_validation->set_rules('cell_phone', $this->lang->line("cell_phone"), 'required');  
        $this->form_validation->set_rules('email', $this->lang->line("email"), 'required');  
        $from_name = $this->input->post('name');
        $from = $this->input->post('email'); 
        $subject = 'Event registered new user from www.bosbd.org';

        $exist = $this->site->wheres_row('event_booking', array('event_id'=>$id, 'email'=>$this->input->post('email')));
        if($exist){

            $this->session->set_flashdata('error', 'You are already booking this event');
            redirect('home/event_booking/'.$id);
            echo "string";
            exit();
        }
        if ($this->form_validation->run() == true) {  
            $data = array( 
                'event_id' => $id,
                'designation' => $this->input->post('designation'),
                'name' => $this->input->post('name'),
                'giver_name' => $this->input->post('giver_name'),
                'post' => $this->input->post('post'),  
                'city' => $this->input->post('city'),  
                'address' => $this->input->post('address'),  
                'country' => $this->input->post('country'),  
                'phone' => $this->input->post('phone'),  
                'cell_phone' => $this->input->post('cell_phone'),  
                'email' => $this->input->post('email'),  
                'accompanying_person' => $this->input->post('accompanying_person'),   
                'created_at' => date('Y-m-d H:i:s')
            ); 

            if($this->site->insert('event_booking', $data)){  
                $this->data['site_link'] = base_url(); 
                $this->data['logo'] = base_url('themes/frontend/bos_theme/assets/images/mail_logo.png'); //
                 $this->data['eventUserInfo'] = array(
                    'name' => $this->input->post('name'),
                    'post' => $this->input->post('post'),
                    'city' => $this->input->post('city'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'cell_phone'=> $this->input->post('cell_phone'),
                    'email' => $this->input->post('email'), 
                    'country' => $this->input->post('country'),
                    'accompanying_person' => $this->input->post('accompanying_person'),   
                    'created_at' => date('Y-m-d H:i:s')
                 );
                $message = $this->load->view($this->frontend_theme.'email_templates/event_reg', $this->data,TRUE);  

                $this->tec->send_email($this->Settings->default_email, $subject, $message, $from, $from_name, NULL, NULL, NULL);

                $this->session->set_flashdata('message', 'Successfull! registered');
                redirect('home/event_booking/'.$id);
            } 
        }

        $this->data['info'] = $this->site->wheres_row('event', array('event_id'=>$id));
        $this->data['page_title'] = 'Event Book';
        $bc = array(array('link' => '#', 'page' => 'Event Book'));
        $meta = array('page_title' => 'Event Book', 'bc' => $bc); 
        $this->frontend_construct('pages/event_booking', $this->data, $meta); 
    }

    function notice(){
        $this->data['info'] = $this->home_model->notice();
        $this->data['page_title'] = 'Notice Board';
        $bc = array(array('link' => '#', 'page' => 'Notice'));
        $meta = array('page_title' => 'Notice Board', 'bc' => $bc); 
        $this->frontend_construct('pages/notice', $this->data, $meta); 
    }
     function notice_details($id){

        $this->data['info'] = $this->site->wheres_row('notice', array('id'=>$id));
        $this->data['page_title'] = 'Notice details';
        $bc = array(array('link' => '#', 'page' => 'Notice details'));
        $meta = array('page_title' => 'Notice details', 'bc' => $bc); 
        $this->frontend_construct('pages/notice_details', $this->data, $meta); 
    }

    function drsearch($type=NULL, $keyword=NULL){
        if($keyword !=NULL){
            $result = $this->home_model->drSearchAutocomplete($type, $keyword);

           // print_r($result); 

            if(sizeof($result) > 0){  ?> 
                <ul class="src_filter">
                    <?php foreach ($result as $key => $value) { ?>
                    <a href="<?php echo base_url('home/dr_details/'.$value->id); ?>">
                        <li>
                            <?php if($value->avatar){ ?>
                            <span><img src="<?php echo base_url('uploads/avatars/'.$value->avatar); ?>"></span>
                            <?php }else{ ?>
                                <span><img src="<?php echo base_url('themes/frontend/bos_theme/assets/images/default-user-image.png'); ?>"></span>
                           <?php } ?>
                           <span><h5><?php echo $value->first_name.' '.$value->last_name; ?></h5><p><?php echo $value->designation ?></p></span>
                        </li>
                    </a>
                    <?php } ?>
                </ul>

            <?php 
                
            }
        }

    }


    function dr_details($id=NULL){ 
        if($id==NULL){
            redirect('home/gmember');
        } 
        $this->data['info'] = $this->home_model->membearInfo($id);
        $this->data['qualification'] = $this->home_model->quInfo($id);
        $this->data['page_title'] = 'Dr. details';
        $bc = array(array('link' => '#', 'page' => 'Dr. details'));
        $meta = array('page_title' => 'Dr. details', 'bc' => $bc); 
        $this->frontend_construct('member/details', $this->data, $meta);  
    }

    

    function honorary()
    {
        $years = $this->input->post('years') ? $this->input->post('years') : NULL; 
        $this->data['infohonorary'] = $this->home_model->getHonoraryMembers($years);
         
        $this->data['page_title'] = 'Role of honorary';
        $bc = array(array('link' => '#', 'page' => 'Role of honorary'));
        $meta = array('page_title' => 'Role of honorary', 'bc' => $bc); 
        $this->frontend_construct('pages/honorary', $this->data, $meta);  
    }

    function ec_members()
    {
        $years = $this->input->post('years') ? $this->input->post('years') : NULL; 
        $this->data['info'] = $this->home_model->getECMembers($years);
        // print_r($this->data['info'] );
        // exit();
        $this->data['years_info'] = $this->home_model->getECMembersYear();
        
        $this->data['page_title'] = 'Role of honorary';
        $bc = array(array('link' => '#', 'page' => 'Role of honorary'));
        $meta = array('page_title' => 'Role of honorary', 'bc' => $bc); 
        $this->frontend_construct('pages/ec_members', $this->data, $meta);  
    }

    function sidebar_searching($keyword=NULL)
    {
        $keyword = base64_decode($keyword);
        if($keyword){

            $result_search = $this->home_model->sidebar_searching_member($keyword); 
            foreach ($result_search as $key => $value) {
                $designation = '';
                if($value->designation){ 
                    $designation = '( '.$value->designation.' )';
                }
                echo "<a href=".base_url("home/dr_details/").$value->id."><li>".$value->first_name." ".$designation."</li></a>";
            }
        } 

    }
	
}

