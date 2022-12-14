<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuSPP extends CI_Controller {

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
    $this->load->model('MSpp');

}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    // $data['lsmasterusers']=$this->MUser->getlistusers();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

    $data['lsmasterspp']=$this->MSpp->GetListMaster_Spp();
    $data['lsinvoice']=$this->MSpp->getlist_invno();
    $data['datenow']=Tanggal;
    $data['m']=M;
    $data['y']=Y;
    $lastPI=$this->MSpp->GetLastNo_Spp();

    if($lastPI==null){

        // echo "T";
        $data['noticket']="0001";

    }else{

        $LastNoPI=$lastPI->gexp_spp_no;
        $nourut = (int) substr($LastNoPI, 3, 1);
        $nourut++;
        $pi=sprintf("%04s",$nourut);
        $data['noticket']=$pi;
        // $TicketPrint= $text."/".$today."/". sprintf("%03s",$looptic);
    }

	$this->load->view('MasterMenuSPP/VList',$data);

}

public function save_master_spp()
{
    $spp_no=$this->input->post('spp_no');
    $inv_no=$this->input->post('invoice_no');
    $nama_spp=$this->input->post('nama_spp');
    $jabatan_spp=$this->input->post('jabatan_spp');

    $data=array(
        'gexp_spp_no'=>$spp_no,
        'gexp_spp_inv_id'=>$inv_no,
        'gexp_spp_nama'=>$nama_spp,
        'gexp_spp_jabatan'=>$jabatan_spp,
        'gexp_spp_createdAt'=>NOW,
        'gexp_spp_createdAt'=>date('Y'),
        'gexp_spp_createdBy'=>$this->session->userdata('logged_gexp_in')->UsersId,
    );

    $this->MSpp->tambah_master_spp($data);

    redirect('MenuSPP');

}

public function view_product_spp($gexp_spp_id)
{

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['rowdetailspp']=$this->MSpp->getrowmaster_sppbyid($gexp_spp_id);

    $data['getlistdetails_spp']=$this->MSpp->getlist_details_Spp($gexp_spp_id);


    $this->load->view('MasterMenuSPP/VDetail_Product',$data);
}


public function save_detail_spp()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $gexp_spp_id=$this->input->post('headid');
    $nama_dagang_lokal=$this->input->post('nama_dagang_lokal');
    $nama_jenis_lokal=$this->input->post('nama_jenis_lokal');
    $no_md=$this->input->post('no_md');
    $nama_dagang_ekspor=$this->input->post('nama_dagang_ekspor');
    $nama_jenis_ekspor=$this->input->post('nama_jenis_ekspor');
    
    $data=array(
        'spp_headid'=>$gexp_spp_id,
        'spp_nama_dagang_lokal'=>$nama_dagang_lokal,
        'spp_nama_jenis_lokal'=>$nama_jenis_lokal,
        'spp_no_md_lokal'=>$no_md,
        'spp_nama_dagang_ekspor'=>$nama_dagang_ekspor,
        'spp_nama_jenis_ekspor'=>$nama_jenis_ekspor,
        'spp_det_createdat'=>NOW,
        'spp_det_createdby'=>$UserId,
    );

    $this->MSpp->tambah_detailmaster_spp($data);

    redirect('MenuSPP/view_product_spp/'.$gexp_spp_id);

}

public function view_detail_description($gexp_spp_id)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['rowdetailspp']=$this->MSpp->getrowmaster_sppbyid($gexp_spp_id);


    $this->load->view('MasterMenuSPP/VDetail_Description',$data);
}


public function save_desc_spp()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $gexp_spp_id=$this->input->post('headid');
    $desc=$this->input->post('desc');
    
    $data=array(
        'gexp_spp_description'=>$desc,
    );

    $this->MSpp->update_descmaster_spp($data,$gexp_spp_id);

    redirect('MenuSPP/view_detail_description/'.$gexp_spp_id);

}


public function print_spp($gexp_spp_id)
{
    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    $data['rowdetailspp']=$this->MSpp->getrowmaster_sppbyid($gexp_spp_id);
    $data['getlistdetails_spp']=$this->MSpp->getlist_details_Spp($gexp_spp_id);
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
        0, // margin top
        0, // margin bottom
        10, // margin header
        8
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
    $html=$this->load->view('LivePrint/spp_print',$data,true);
    $mpdf->WriteHTML($html);
    $filename = "Export-SPP";
    $time = date('YmdHis');
    $mpdf->Output($filename."-".$time.".pdf", 'I');
}


}