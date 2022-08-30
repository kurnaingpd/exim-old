<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakPI extends CI_Controller
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
    }

    public function testload_data($Id_PI){
        $data['listdataPI_byId']=$this->MBoardPI->GetList_PI_ById($Id_PI);
        $customer_id=$data['listdataPI_byId'][0]->gexp_pi_customer;
        $listdatabank_cust=$this->MBoardPI->Get_BankCust_ById($customer_id);
        $getfoods=$this->MBoardPI->GetList_AllFoods_ByPI($Id_PI);
        print_r($getfoods);
    }

    public function printout_PI($Id_PI)
    {
        $data['list_purchasegood']=$this->MBoardPI->GetList_PurchaseGood($Id_PI);
        $data['list_freegood']=$this->MBoardPI->GetList_FreeGood($Id_PI);
        $data['listdataPI_byId']=$this->MBoardPI->GetList_PI_ById($Id_PI);
        $data['checker_item_freegood']=$this->MBoardPI->GetList_PI_ById($Id_PI);
        $customer_id=$data['listdataPI_byId'][0]->gexp_pi_consignee_id;
        $listdatabank_cust=$this->MBoardPI->Get_BankCust_ById($customer_id);
        $getfoods=$this->MBoardPI->GetList_AllFoods_ByPI($Id_PI);
        $data['totalqty_perinv']=$this->MBoardPI->SumaryQty_ByPI($Id_PI);
        $data['totalprice_perinv']=$this->MBoardPI->SumaryPrice_ByPI($Id_PI);
        $Consig=$data['listdataPI_byId'][0]->Consig;
        $ConsTown=$data['listdataPI_byId'][0]->Cons_Town;
        $NO_PI=$data['listdataPI_byId'][0]->gexp_pi_no;
        $PO=$data['listdataPI_byId'][0]->gexp_pi_po;
        $Consig_addr=$data['listdataPI_byId'][0]->Cons_addr;
        $Consig_phone=$data['listdataPI_byId'][0]->Cons_phone;
        $Destinat_port=$data['listdataPI_byId'][0]->DestinatPort;
        $TOPCust=$data['listdataPI_byId'][0]->TOPCust;
        $Bank_name=$data['listdataPI_byId'][0]->Bank_name;
        $Bank_acc=$data['listdataPI_byId'][0]->Bank_acc;
        $Bank_swiftcode=$data['listdataPI_byId'][0]->Bank_swiftcode;
        $Benefi=$data['listdataPI_byId'][0]->Benefi;
        $Bene_office=$data['listdataPI_byId'][0]->Bene_office;
        $Bene_addr=$data['listdataPI_byId'][0]->Bene_addr;
        $Bene_phone=$data['listdataPI_byId'][0]->Bene_phone;
        $negara=$data['listdataPI_byId'][0]->Negara;
        $ppic=$data['listdataPI_byId'][0]->PPIC;
        $loadport_name=$data['listdataPI_byId'][0]->Loadport_Name;

        require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $mpdf->defaultheaderline = 0;
        $mpdf->defaultfooterline = 0;
        $mpdf->SetHeader(
            '<img src="' . base_url() . 'assets/images/skp-logo-crop-removebg.png" width="16%" style="margin-bottom: 3%;" />
            |<div style="font-style: normal;">
                PROFORMA INVOICE
            </div>
            |');
        $mpdf->AddPage(
            'P', // L - landscape, P - portrait 
            '', '', '', '',
            20, // margin_left
            20, // margin right
            30, // margin top
            0, // margin bottom
            10, // margin header
            8
        );
        $mpdf->SetFooter('
            <div style="font-style: normal; font-size:9px; text-align: left;">Note : Please Sign This Proforma Invoice, fill the date and send back to us with PO as your confirmation</div>
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
        // $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
        $html=$this->load->view('LivePrint/Proforma_Invoice',$data,true);
        $mpdf->WriteHTML($html);
        $filename = "Export-ProformaInvoice";
        $time = date('YmdHis');
        $mpdf->Output($filename."-".$time.".pdf", 'I');
        exit;
    }
}