<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuCOA extends CI_Controller
{

    function __construct(){
        parent:: __construct();
        
        if(!$this->session->userdata('logged_gexp_in')){
            redirect('LoginSys/doLogout');
        }
        $this->load->model('MRoot');
        $this->load->model('MLogin');
        $this->load->model('MUser');
        $this->load->model('MGroup');
        $this->load->model('MBoardPI');
        $this->load->model('MCoa');
        $this->load->model('MApproval');
        $this->load->model('MFin');

    }

    public function index()
    {
        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $DataUsers=$this->MLogin->GetProfileSign($UserId);
        $GroupMenu=$DataUsers->UserGroup;
        $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
        $data['groupname']=$this->MLogin->GetGroupName($UserId);

        $data['lsmastercoa']=$this->MCoa->getlistmstcoa();
        $data['invoice']=$this->MCoa->invoice();
        $this->load->view('MasterCOA/VList',$data);
    }

    public function search()
    {
        $params = $this->input->post();
        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $DataUsers=$this->MLogin->GetProfileSign($UserId);
        $GroupMenu=$DataUsers->UserGroup;
        $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
        $data['groupname']=$this->MLogin->GetGroupName($UserId);

        $data['lsmastercoa']=$this->MCoa->getsearchcoa($params);
        $data['invoice']=$this->MCoa->invoice();
        $this->load->view('MasterCOA/VSearch',$data);
    }

    public function create_coa()
    {
        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $DataUsers=$this->MLogin->GetProfileSign($UserId);
        $GroupMenu=$DataUsers->UserGroup;
        $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
        $data['groupname']=$this->MLogin->GetGroupName($UserId);

        $data['datenow']=Tanggal;
        $data['listdataPI']=$this->MApproval->GetList_PI();
        $data['m']=M;
        $data['y']=Y;
        $lastCOA=$this->MCoa->GetLastCoa_No();
        if($lastCOA==null){
            $data['noticket']="0001";
        }else{
            $LastNoPI=$lastCOA->gexp_coa_no;
            $nourut = (int) substr($LastNoPI, 3, 1);
            $nourut++;
            $coa=sprintf("%04s",$nourut);
            $data['noticket']=$coa;
        }

        $data['lsinvoice_notselect']=$this->MCoa->GetListInvoice_NotSelect();
        $this->load->view('MasterCOA/CreateCoa',$data);

    }


    public function savecoa_no()
    {

        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $no_coa=$this->input->post('no_coa');
        $id_invoice=$this->input->post('no_invoice');
        $date=$this->input->post('date_coa');
        $checkno_invoice=$this->MCoa->Check_Invoice_No($id_invoice);

        if($checkno_invoice){
            echo "Sudah Terdaftar";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Invoice Sudah Digunakan');
            redirect('MenuCOA');
        }else{
            $getrows_Inv=$this->MCoa->GetrowsInvoice($id_invoice);
            $Id_PI=$getrows_Inv->gexp_invoice_pi;
            $getrows_PI=$this->MCoa->GetrowsPI($Id_PI);
            $consignee_id=$getrows_PI->gexp_pi_consignee_id;
            $cust=$this->MCoa->Getrows_Customer($consignee_id);
            $country_code=$cust->CountryCode;
            $gexp_coa_no=$no_coa.$country_code;
            $data=array(
                'gexp_coa_no'=>$gexp_coa_no,
                'gexp_coa_invoice'=>$id_invoice,
                'gexp_coa_date'=>Tanggal,
                'gexp_coa_years'=>Y,
                'gexp_coa_createdAt'=>NOW,
                'gexp_coa_createdBy'=>$UserId,
            );

            $insert=$this->MCoa->tambah_coa($data);
            $items=$this->MCoa->getcoaitem($id_invoice);

            if($insert){
                $this->session->set_flashdata('success','COA Successfully Created');
                redirect('MenuCOA');
            }else{
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
                redirect('MenuCOA');
            }
        }
    }


    public function detailmap_coa($coa_id)
    {
        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $DataUsers=$this->MLogin->GetProfileSign($UserId);
        $GroupMenu=$DataUsers->UserGroup;
        $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
        $data['groupname']=$this->MLogin->GetGroupName($UserId);
        $data['lsdetailscoa']=$this->MCoa->getcoa_detail($coa_id);
        $data['rowsmastercoa']=$this->MCoa->GetrowsCOA($coa_id);
        $data['lsitembypl']=$this->MCoa->getpackage_itemcoa_byPL($coa_id);
        $data['coa_id']=$coa_id;
        $this->load->view('MasterCOA/Detail_Coa',$data);
    }

    public function getitemdet_qc(){
        $this->load->model('MBoardPI');
        $dat         		= array();
        $product_id    	    = $this->input->post("post_data");
        $data              	= $this->MCoa->getitemdet_qc($product_id);
        $dat['ProductionDate'] 	= $data['gexp_qc_production_date'];
        print_r(json_encode($dat));
    }

    // public function get_item_qc_byPL(){
        // $this->load->model('MCoa');
        // $array_data         = array();
        // $product_id     	= $this->input->post("post_data");
        // $query              = $this->MCoa->getitemdet_qc($product_id);
        
        // foreach($query as $a => $data):
            // $dat['ProductionDate'] 		= $data['gexp_qc_production_date'];
            // $dat['RowsId'] 		        = $data['gexp_qc_id'];
            // array_push($array_data,$dat);
        // endforeach;

        // print_r(json_encode($array_data));
    // }

    public function get_item_qc_byPL($param = NULL){
        $this->load->model('MCoa');
        $query =  $this->MCoa->getitemdet_qc($param);
        $data = "<option value=''>Choose ...</option>";

        foreach ($query as $value) {
            $data .= "<option value='".$value['gexp_qc_id']."'>".strtoupper($value['gexp_qc_production_date'])."</option>";
        }
        echo $data;
    }


    public function get_item_qc_details(){
        $this->load->model('MCoa');
        $array_data         = array();
        $product_date     	= $this->input->post("post_data");
        $query              = $this->MCoa->get_item_qc_details($product_date);
        
        foreach($query as $a => $data):
                $dat['QCId']        = $data['gexp_qc_id'];
                $dat['ExpDate']     = $data['gexp_qc_expired_date'];
                $dat['Aroma'] 		= $data['gexp_qc_aroma'];
                $dat['Taste'] 		= $data['gexp_qc_taste'];
                $dat['Moisture']    = $data['gexp_qc_moisture'];
                $dat['Ph']          = $data['gexp_qc_ph'];
                $dat['Brix']        = $data['gexp_qc_brix'];
                $dat['Salmonella']  = $data['gexp_qc_salmonella'];
                $dat['Enterobacteria'] = $data['gexp_qc_enterobacteria'];
                $dat['PlateCount']  = $data['gexp_qc_total_plate_count'];
                $dat['MoldYeast']   = $data['gexp_qc_yeast_mold'];
            // $dat['AREA_NAME'] 		= $data['Area_Name'];
            array_push($array_data,$dat);
        endforeach;

        print_r(json_encode($array_data));
    }


    public function add_coa_details()
    {

        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $coa_head = $this->input->post("coa_head");
        $qc_id = $this->input->post("qc_id");
        $item_id = $this->input->post("item_product_id");
        $qc_id = $this->input->post("qc_id");
        $productdate = $this->input->post("input_ProductDate");
        $batch = $this->input->post("input_batch");
        $Mercury = $this->input->post("input_Mercury");
        $Lead = $this->input->post("input_Lead");
        $Cadmium = $this->input->post("input_Cadmium");
        $Tin = $this->input->post("input_Tin");
        $Arsenic = $this->input->post("input_Arsenic");

        $data=array(
            'detail_coa_head'=>$coa_head,
            'detail_coa_itemid'=>$item_id,
            'detail_coa_qcid'=>$qc_id,
            // 'detail_coa_prodname'=>$coa_head,
            'detail_coa_batch'=>$batch,
            'detail_coa_qc_proddate'=>$productdate,
            'Mercury'=>$Mercury,
            'Lead'=>$Lead,
            'Cadmium'=>$Cadmium,
            'Tin'=>$Tin,
            'Arsenic'=>$Arsenic,
            'detail_createdAt'=>NOW,
            'detail_createdBy'=>$UserId,
        );

        $insert=$this->MCoa->tambah_detail_coa($data);

        redirect('MenuCOA/detailmap_coa/'.$coa_head);
        


        // print_r($coa_head);
        // print_r($qc_id);
    }

    public function preview_details_coa($idcoa_details)
    {
        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $DataUsers=$this->MLogin->GetProfileSign($UserId);
        $GroupMenu=$DataUsers->UserGroup;
        $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
        $data['groupname']=$this->MLogin->GetGroupName($UserId);

        $data['getrowdetails_coa']=$this->MCoa->getdetailscoa_bydetsid($idcoa_details);

            // $data['lsdetailscoa']=$this->MCoa->getcoa_detail($coa_id);
            // $data['rowsmastercoa']=$this->MCoa->GetrowsCOA($coa_id);
            // print_r($idcoa_details);
        $this->load->view('MasterCOA/Preview_Coa',$data);
    }


    public function print_details_coa($idcoa_details)
    {
        require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf

        $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
        $DataUsers=$this->MLogin->GetProfileSign($UserId);
        $GroupMenu=$DataUsers->UserGroup;
        $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
        $data['groupname']=$this->MLogin->GetGroupName($UserId);
        $data['getrowdetails_coa']=$this->MCoa->getdetailscoa_bydetsid($idcoa_details);
        
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $mpdf->defaultheaderline = 0;
        $mpdf->defaultfooterline = 0;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->SetHeader('<img src="' . base_url() . 'assets/images/skp-logo-crop-removebg.png" width="17%" />||');
        $mpdf->AddPage(
            'P', // L - landscape, P - portrait 
            '', '', '', '',
            20, // margin_left
            20, // margin right
            20, // margin top
            0, // margin bottom
            10, // margin header
            5
        );
        $mpdf->SetFooter('
            <table style="font-size: 9px; width: 100%; margin-top: 2%;">
                <tr>
                    <td align="left">
                        <b>Factory Kudus</b><br>
                        Jl. Lingkar Timur, Loram Wetan<br>
                        Jati, Kab. Kudus<br>
                        Jawa Tengah 59344<br>
                        P +62 291 4257202<br>
                        sumberkopiprima.com
                    </td>
                    <td align="left" style="padding-left: 40%;">
                        <b>Factory Mojokerto</b><br>
                        Jl. Raya Mojokerto - Lamongan<br>
                        Desa Mojokumpul, Kemlagi<br>
                        Mojokerto<br>
                        Jawa Timur 61353
                    </td>
                </tr>
            </table>
        ');
        $html=$this->load->view('LivePrint/coa_print',$data,true);
        $mpdf->WriteHTML($html);
        $filename = "Export-COA";
        $time = date('YmdHis');
        $mpdf->Output($filename."-".$time.".pdf", 'I');
    }
}