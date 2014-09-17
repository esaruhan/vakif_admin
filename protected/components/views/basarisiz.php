		<?php 
                
                        $posts = Data::getBasarisizBagisYapanlar();
                
                ?>	
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Bağış Yapanlar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                                                  <th>Durum</th>
								  <th>Ad-Soyad</th>
								  <th>Bağış Tarih</th>
								  <th>Bağış Tipi</th>
								  <th>Tekrar Süre</th>
                                                                  <th>Telefon</th>
                                                                  <th>E-Mail</th>
                                                                  <th>Bağış Miktar ( TL )</th>
                                                                  <th>Hata Mesajı</th>
								  <th>Bağış Tipi</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      <?php foreach ($posts as &$record) { 
                                                          
                                                          $id                       = $record->id;
                                                          $ad_soyad                 = $record->ad_soyad;
                                                          $bagis_tip                = $record->bagis_tip;
                                                          $email                    = $record->email;
                                                          $telefon                  = '0'.$record->telefon;
                                                          $mesaj                    = $record->mesaj;
                                                          $bagis_tutar              = $record->bagis_tutar;
                                                          $bagis_odeme_sekli        = $record->bagis_odeme_sekli;
                                                          $bagis_tekrar             = $record->bagis_tekrar;
                                                          $kurban_odeme_sekli       = $record->kurban_odeme_sekli;
                                                          $kurban_taksi             = $record->kurban_taksit;
                                                          $bagis_zamani             = $record->bagis_zamani;
                                                          $durum                    = $record->durum;
                                                          $hata_mesaj               = $record->hata_mesaj;
                                                          
                                                          $bagis_tip_ismi           = Data::getBagisTipi($bagis_tip);
                                                          $label                    = Data::getLabelData($bagis_tip);
                                                          $durum_label              = Data::getDurum($durum);
                                                          $telefon_arama            = Data::getTelefonAramaDurum($record->telefon);
                                                      ?>
							<tr>
                                                                <td>
                                                                    <span class="label <?php echo $durum_label['label'];  ?>"><?php echo $durum_label['durum'];  ?></span>
                                                                </td>
								<td><?php echo $ad_soyad;?></td>
								<td class="center"><?php echo $bagis_zamani ;?> </td>
                                                                <td class="center"><?php echo $bagis_tip_ismi ; ?></td>
								<td class="center">
									<?php 
                                                                            if($bagis_tip == 1 && $bagis_odeme_sekli == 1){
                                                                                    echo  $bagis_tekrar;
                                                                            } else if($bagis_tip == 1 && $bagis_odeme_sekli == 0){
                                                                                    echo  "Tek Sefer Burs";
                                                                            } else {
                                                                                    echo "-";
                                                                            }
                                                                                
                                                                                
                                                                         ?>
								</td>
                                                                <td class="center"><?php  echo "<a href='tel:$telefon'>$telefon_arama</a>";?></td>
                                                                <td class="center"><?php  echo $email;?></td>
                                                                <td class="center"><?php echo $bagis_tutar ?></td>
                                                                <td class="center"><?php echo $hata_mesaj ?></td>
                                                                <td class="center">
                                                                    <span class="label <?php echo $label['label'];  ?>"><?php echo $label['bagis'];  ?></span>
                                                                </td>
							</tr>
                                                      <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
