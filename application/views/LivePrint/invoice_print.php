<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Invoice_Print</title>

        <style>
            .p_title {
                text-align: center; 
                font-weight: bold; 
                font-size: 11px; 
                margin-bottom: -50px; 
                text-decoration: underline;
            }
            
            .p_nomor {
                text-align: center; 
                font-weight: normal;
                margin-top: 0px;
                font-size: 9px; 
            }

            /* table{
                border-collapse:collapse;  
                overflow: wrap;
                font-size:11px;
            }
            td{
                border-collapse: collapse; 
                padding:3px;
                font-size:11px;
            }
            .pre-line{
                white-space: pre-line;
            }
            .th{
                text-align: center;
                font-size:11px;
            } */

            table{
                border-collapse:collapse;  
                overflow: wrap;
            }

            td{
                border-collapse: collapse; 
                padding:3px;
                text-align: center;
            }

            .th{
                text-align: center;
            }

            .td_title_header {
                text-align:left; 
                border-width:0.5px; 
                width: 200px; 
                padding:5px; 
                font-size:9px;
            }

            .td_titik_header {
                text-align:left; 
                border-width:0.5px; 
                width: 20px; 
                padding:5px; 
                font-size:8px;
            }

            .td_data_header {
                vertical-align:middle; 
                text-align:left; 
                border-width:2px; 
                width: 460px; 
                padding:5px; 
                font-size:8px;
            }

            .td_title_detail {
                border:solid; 
                border-width:0.5px; 
                font-size:8px;
            }

            .td_data_detail {
                border:solid; 
                border-width:0.5px; 
                font-size:8px;
            }

            .td_sum {
                border:solid; 
                border-width:0.5px; 
                font-weight:bold;
                font-size:8px;
            }

            .td_title_notes {
                text-align:left; 
                border-width:0.5px; 
                width: 200px; 
                padding:3px; 
                font-size:8px;
            }

            .td_titik_notes {
                text-align:left; 
                border-width:0.5px; 
                width: 20px; 
                padding:3px; 
                font-size:8px;
            }

            .td_data_notes {
                vertical-align:middle; 
                text-align:left; 
                border-width:2px; 
                width: 460px; 
                padding:3px; 
                font-size:8px;
            }
        </style>

    </head>
    <body>
        <!-- <table style="margin-bottom: 2%;">
            <tr>
                <td style="padding-right: 30%;">
                    <img src="<?=base_url('assets/images/skp-logo-crop-removebg.png')?>" width="18%">
                </td>
            </tr>
        </table>-->

        <p class="p_title">INVOICE</p>
        <p class="p_nomor"><?=$lsinvoice_byid->gexp_invoice_no?></p>

        <table>
            <tr>
                <td class="td_title_header">PI NO.</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=$lsinvoice_byid->gexp_pi_no?></td>
            </tr>

            <tr>
                <td class="td_title_header">PO</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=$lsinvoice_byid->gexp_pi_po?></td>
            </tr>

            <tr>
                <td class="td_title_header">CONSIGNEE</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header">
                    <?php
                        echo strtoupper($lsinvoice_byid->ConsigPT.'<br>'.$lsinvoice_byid->ConsigAddr.'<br>TEL : '.$lsinvoice_byid->ConsigCtPhone.'"ATTN : '.$lsinvoice_byid->ConsigCtName);
                    ?>
                </td>
            </tr>

            <tr>
                <td class="td_title_header">NOTIFY</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header">
                    <?php
                        echo strtoupper($lsinvoice_byid->ConsigPT.'<br>'.$lsinvoice_byid->ConsigAddr.'<br>TEL : '.$lsinvoice_byid->ConsigCtPhone.'<br>ATTN : '.$lsinvoice_byid->ConsigCtName);
                    ?>
                </td>
            </tr>

            <tr>
                <td class="td_title_header">SHIPPER</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header">
                    <?php
                        echo strtoupper($lsinvoice_byid->BenePT.'<br>'.$lsinvoice_byid->BeneAddr.'<br>TEL : '.$lsinvoice_byid->BeneCtPhone);
                    ?>
                </td>
            </tr>

            <tr>
                <td class="td_title_header">ETD EST</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header">30 WORKING DAYS</td>
            </tr>

            <tr>
                <td class="td_title_header">DESTINATION</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=strtoupper($lsinvoice_byid->DestinationPort)?></td>
            </tr>

            <tr>
                <td class="td_title_header">LOADING PORT</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=strtoupper($lsinvoice_byid->LoadPortDesc)?></td>
            </tr>

            <tr>
                <td class="td_title_header">COUNTRY OF ORIGIN</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header">INDONESIA</td>
            </tr>

            <tr>
                <td class="td_title_header">FFRN #</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=strtoupper($lsinvoice_byid->gexp_invoice_ffrn)?></td>
            </tr>
        </table>

        <table style="margin-top: 10px; overflow: wrap;">
            <tr>
                <td class="th td_title_detail">NO.</td>

                <?php if($checkvalue_print->inv_print_carton_barcode=='1') : ?>
                    <td class="th td_title_detail">CARTOON BARCODE</td>
                <?php endif; ?>

                <td class="th td_title_detail">CONTAINER</td>
                <td class="th td_title_detail">HS CODE</td>
                <td class="th td_title_detail">DESCRIPTION OF GOODS</td>
                <td class="th td_title_detail">PACKING</td>
                <td class="th td_title_detail">QTY</td>

                <?php if($checkvalue_print->inv_print_batch=='1') : ?>
                    <td class="th td_title_detail">BATCH</td>
                <?php endif; ?>

                <?php if($checkvalue_print->inv_print_expired_date=='1') : ?>
                    <td class="th td_title_detail">EXP. DATE</td>
                <?php endif; ?>

                <?php if($checkvalue_print->inv_print_production_date=='1') : ?>
                    <td class="th td_title_detail">PRODUCTION DATE</td>
                <?php endif; ?>

                <td class="th td_title_detail">UNIT PRICE<br>(<?=$checkvalue_print->icon?>)</td>
                <td class="th td_title_detail">TOTAL PRICE<br>(<?=$checkvalue_print->icon?>)</td>
            </tr>

            <?php if(isset($lspurchase_goods)) :
                $no_urut = 1;
                $tQtyPurchase = 0;
                $tPricePurchase = 0;
                foreach($lspurchase_goods as $gaa => $rows) : 
                    $PricePurchase = $rows->gexp_packlistdet_qty * $rows->gexp_good_price;
            ?>
                <tr>
                    <td class="td_data_detail"><?=$no_urut?></td>

                    <?php if($checkvalue_print->inv_print_carton_barcode=='1') : ?>
                        <td class="td_data_detail"><?=$rows->gexp_packlistdet_carton_bar?></td>
                    <?php endif; ?>

                    <td class="td_data_detail"><?=$rows->gexp_packlist_container?></td>
                    <td class="td_data_detail"><?=$rows->gexp_good_hs_code?></td>
                    <td class="td_data_detail" align="left"><?=$rows->gexp_packlistdet_descgod?></td>
                    <td class="td_data_detail" align="left"><?=$rows->gexp_packlistdet_packing?></td>
                    <td class="td_data_detail" align="right"><?=number_format($rows->gexp_packlistdet_qty)?></td>

                    <?php if($checkvalue_print->inv_print_batch=='1') : ?>
                        <td class="td_data_detail"><?=$rows->gexp_packlistdet_batch?></td>
                    <?php endif; ?>

                    <?php if($checkvalue_print->inv_print_expired_date=='1') : ?>
                        <td class="td_data_detail"><?=$rows->gexp_packlistdet_expdate?></td>
                    <?php endif; ?>

                    <?php if($checkvalue_print->inv_print_production_date=='1') : ?>
                        <td class="td_data_detail"><?=$rows->gexp_packlistdet_proddate?></td>
                    <?php endif; ?>

                    <td class="td_data_detail" align="right"><?=number_format($rows->gexp_good_price, 2,".",",")?></td>
                    <td class="td_data_detail" align="right"><?=number_format($PricePurchase, 2,".",",")?></td>
                </tr>
            <?php 
                    $no_urut++;
                    $tQtyPurchase += $rows->gexp_packlistdet_qty;
                    $tPricePurchase += $PricePurchase;
                    endforeach; 
                endif;

                $tCFR = $tPricePurchase + $lsinvoice_byid->gexp_pi_freight_cost;
                $tCIF = $tPricePurchase + $lsinvoice_byid->gexp_pi_insurance + $lsinvoice_byid->gexp_pi_freight_cost;
                
                if($lsinvoice_byid->CtIncoterm=='3') {
                    $terbilang = CurencyLang::toEnglish($tCIF);
                } else {
                    $terbilang = CurencyLang::toEnglish($tCFR);
                }

                $cols_fob1 = 6;
                $cols_freight = 7;
                $cols_insurance = 7;
                $cols_cif = 7;
                $cols_cfr = 7;
                $cols_said = 8;
                if($checkvalue_print->inv_print_carton_barcode<>'1') {
                    $cols_fob1 = $cols_fob1-1;
                }

                $cols_etc1 = 1 + $checkvalue_print->colspan_etc;
                $cols_freight = $cols_freight + $checkvalue_print->colspan_all;
                $cols_insurance = $cols_insurance + $checkvalue_print->colspan_all;
                $cols_cif = $cols_cif + $checkvalue_print->colspan_all;
                $cols_cfr = $cols_cfr + $checkvalue_print->colspan_all;
                $cols_said = $cols_said + $checkvalue_print->colspan_all;
            ?>

            <tr>
                <td colspan="<?=$cols_fob1?>" class="td_sum" align="left">TOTAL FOB</td>
                <td class="td_sum" align="right"><?=number_format($tQtyPurchase)?></td>
                <td colspan="<?=$cols_etc1?>" class="td_sum"></td>
                <td class="td_sum" align="right"><?=number_format($tPricePurchase, 2,".",",")?></td>
            </tr>

            <?php if($lsinvoice_byid->CtIncoterm=='3' || $lsinvoice_byid->CtIncoterm=='2') : ?>
                <tr>
                    <td colspan="<?=$cols_freight?>" class="td_sum" align="left">OCEAN FREIGHT</td>
                    <td class="td_sum" align="right"><?=number_format($lsinvoice_byid->gexp_pi_freight_cost, 2,".",",")?></td>
                </tr>
            <?php endif; ?>

            <?php if($lsinvoice_byid->CtIncoterm=='3') : ?>
                <tr>
                    <td colspan="<?=$cols_insurance?>" class="td_sum" align="left">INSURANCE</td>
                    <td class="td_sum" align="right"><?=number_format($lsinvoice_byid->gexp_pi_insurance, 2,".",",")?></td>
                </tr>

                <tr>
                    <td colspan="<?=$cols_cif?>" class="td_sum" align="left">TOTAL CIF</td>
                    <td class="td_sum" align="right"><?=number_format($tCIF, 2,".",",")?></td>
                </tr>
            <?php endif; ?>

            <?php if($lsinvoice_byid->CtIncoterm=='2') : ?>
                <tr>
                    <td colspan="<?=$cols_cfr?>" class="td_sum" align="left">TOTAL CFR</td>
                    <td class="td_sum" align="right"><?=number_format($tCFR, 2,".",",")?></td>
                </tr>
            <?php endif; ?>

            <?php if($lsinvoice_byid->CtIncoterm=='3' || $lsinvoice_byid->CtIncoterm=='2') : ?>
                <tr>
                    <td colspan="<?=$cols_said?>" class="td_sum" align="left">SAY : <?=strtoupper($terbilang.' '.$checkvalue_print->spell)?></td>
                </tr>
            <?php endif; ?>
        </table>

        <div style="margin-top: 20px; margin-bottom: 1px; font-size:9px;">FREE GOODS</div>
        <table style="overflow: wrap;">
            <tr>
                <td class="th td_title_detail">NO.</td>

                <?php if($checkvalue_print->inv_print_carton_barcode=='1') : ?>
                    <td class="th td_title_detail">CARTOON BARCODE</td>
                <?php endif; ?>

                <td class="th td_title_detail">CONTAINER</td>
                <td class="th td_title_detail">HS CODE</td>
                <td class="th td_title_detail">DESCRIPTION OF GOODS</td>
                <td class="th td_title_detail">PACKING</td>
                <td class="th td_title_detail">QTY</td>

                <?php if($checkvalue_print->inv_print_batch=='1') : ?>
                    <td class="th td_title_detail">BATCH</td>
                <?php endif; ?>

                <?php if($checkvalue_print->inv_print_expired_date=='1') : ?>
                    <td class="th td_title_detail">EXP. DATE</td>
                <?php endif; ?>

                <?php if($checkvalue_print->inv_print_production_date=='1') : ?>
                    <td class="th td_title_detail">PRODUCTION DATE</td>
                <?php endif; ?>

                <td class="th td_title_detail">UNIT PRICE<br>(<?=$checkvalue_print->icon?>)</td>
                <td class="th td_title_detail">TOTAL PRICE<br>(<?=$checkvalue_print->icon?>)</td>
            </tr>

            <?php if(isset($lsfree_goods)) :
                $no = 1;
                $tQtyFree = 0;
                $tPriceFree = 0;
                foreach($lsfree_goods as $gab => $vals) : 
                    $PriceFree = $vals->gexp_good_qty * $vals->gexp_good_price;
            ?>
                <tr>
                    <td class="td_data_detail"><?=$no?></td>

                    <?php if($checkvalue_print->inv_print_carton_barcode=='1') : ?>
                        <td class="td_data_detail"><?=$vals->gexp_packlistdet_carton_bar?></td>
                    <?php endif; ?>

                    <td class="td_data_detail"><?=$vals->gexp_packlist_container?></td>
                    <td class="td_data_detail"><?=$vals->gexp_good_hs_code?></td>
                    <td class="td_data_detail" align="left"><?=$vals->gexp_packlistdet_descgod?></td>
                    <td class="td_data_detail" align="left"><?=$vals->gexp_packlistdet_packing?></td>
                    <td class="td_data_detail" align="right"><?=number_format($vals->gexp_good_qty)?></td>

                    <?php if($checkvalue_print->inv_print_batch=='1') : ?>
                        <td class="td_data_detail"><?=$vals->gexp_packlistdet_batch?></td>
                    <?php endif; ?>

                    <?php if($checkvalue_print->inv_print_expired_date=='1') : ?>
                        <td class="td_data_detail"><?=$vals->gexp_packlistdet_expdate?></td>
                    <?php endif; ?>

                    <?php if($checkvalue_print->inv_print_production_date=='1') : ?>
                        <td class="td_data_detail"><?=$vals->gexp_packlistdet_proddate?></td>
                    <?php endif; ?>

                    <td class="td_data_detail" align="right"><?=number_format($vals->gexp_good_price, 2,".",",")?></td>
                    <td class="td_data_detail" align="right"><?=number_format($PriceFree, 2,".",",")?></td>
                </tr>
            <?php 
                    $no++;
                    $tQtyFree += $vals->gexp_good_qty;
                    $tPriceFree += $PriceFree;
                    endforeach; 
                endif;

                $grandNumber = $tQtyPurchase + $tQtyFree;

                $cols_fob = 6;
                if($checkvalue_print->inv_print_carton_barcode<>'1') {
                    $cols_fob = $cols_fob-1;
                }

                $cols_etc = 1 + $checkvalue_print->colspan_etc;
            ?>
            
            <tr>
                <td colspan="<?=$cols_fob?>" class="td_sum" align="left">TOTAL FOB</td>        
                <td class="td_sum" align="right"><?=number_format($tQtyFree)?></td>
                <td colspan="<?=$cols_etc?>" class="td_sum"></td>
                <td class="td_sum" align="right"><?=number_format($tPriceFree, 2,".",",")?></td>
            </tr>
        </table>

        <div style="margin-top: 20px; margin-bottom: 2px; font-size:9px; padding-left: 3px; font-weight:bold;">PURCHASE GOODS</div>
        <table>
            <tr>
                <td class="td_title_notes">NUMBER OF CASE</td>
                <td class="td_titik_notes">:</td>
                <td class="td_data_notes"><?=number_format($tQtyPurchase)?></td>
            </tr>

            <tr>
                <td class="td_title_notes">AMOUNT</td>
                <td class="td_titik_notes">:</td>
                <td class="td_data_notes"><?=number_format($tPricePurchase, 2,".",",")?></td>
            </tr>
        </table>

        <div style="margin-top: 20px; margin-bottom: 2px; font-size:9px; padding-left: 3px; font-weight:bold;">FREE GOODS</div>
        <table>
            <tr>
                <td class="td_title_notes">NUMBER OF CASE</td>
                <td class="td_titik_notes">:</td>
                <td class="td_data_notes"><?=number_format($tQtyFree)?></td>
            </tr>

            <tr>
                <td class="td_title_notes">AMOUNT</td>
                <td class="td_titik_notes">:</td>
                <td class="td_data_notes"><?=number_format($tPriceFree, 2,".",",")?></td>
            </tr>
        </table>

        <div style="margin-top: 20px; margin-bottom: 2px; font-size:9px; padding-left: 3px; font-weight:bold;">GRAND TOTAL</div>
        <?php
            if($lsinvoice_byid->CtIncoterm=='3') {
                $amount = $tCIF;
                $terbilang = CurencyLang::toEnglish($tCIF);
            } elseif($lsinvoice_byid->CtIncoterm=='2') {
                $amount = $tCFR;
                $terbilang = CurencyLang::toEnglish($tCFR);
            } else {
                $amount = $tPricePurchase;
                $terbilang = CurencyLang::toEnglish($tPricePurchase);
            }
        ?>
        <table>
            <tr>
                <td class="td_title_notes">NUMBER OF CASE</td>
                <td class="td_titik_notes">:</td>
                <td class="td_data_notes"><?=number_format($grandNumber)?></td>
            </tr>

            <tr>
                <td class="td_title_notes">AMOUNT</td>
                <td class="td_titik_notes">:</td>
                <td class="td_data_notes"><?=number_format($amount, 2,".",",")?></td>
            </tr>

            <tr>
                <td class="td_title_notes">SAY</td>
                <td class="td_titik_notes">:</td>

                <td class="td_data_notes"><?=strtoupper($terbilang.' '.$checkvalue_print->spell)?></td>
            </tr>
        </table>

        <table style="font-size: 10px; margin-top: 9%;">
            <tr>
                <td align="center">Kudus, <?=$lsinvoice_byid->gexp_packlist_date?></td>
            </tr>
            <tr>
                <td align="center" style="padding-top: 40px; text-decoration:underline;"><?=strtoupper($lsinvoice_byid->print_name)?></td>
            </tr>
            <tr>
                <td align="center">FINANCE</td>
            </tr>
        </table>
    </body>
</html>