
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Kurban Kesim Yapılacaklar</h2>
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
                                                                  <th>Kesim</th>
								  <th>Ad-Soyad</th>
								  <th>Kurban Tipi</th>
                                                                  <th>Kurban Adet</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      <?php foreach ($posts as &$record) { 
                                                          
                                                          $id                       = $record->id;
                                                          $ad_soyad                 = $record->ad_soyad;
                                                          $bagis_tip                = $record->bagis_tip;
                                                          $email                    = $record->email;
                                                          $telefon                  = $record->telefon;
                                                          $mesaj                    = $record->mesaj;
                                                          $bagis_tutar              = $record->bagis_tutar;
                                                          $bagis_odeme_sekli        = $record->bagis_odeme_sekli;
                                                          $bagis_tekrar             = $record->bagis_tekrar;
                                                          $kurban_odeme_sekli       = $record->kurban_odeme_sekli;
                                                          $kurban_taksi             = $record->kurban_taksit;
                                                          $bagis_zamani             = $record->bagis_zamani;
                                                          $kurban_kesim_durum       = $record->kurban_kesim_durum;
                                                          $kurban_adet              = $record->kurban_adet;
                                                          
                                                          $bagis_tip_ismi           = Data::getBagisTipi($bagis_tip);
                                                          $label                    = Data::getKurbanDurum($kurban_kesim_durum);
                                                      ?>
							<tr>
                                                            <td>    
                                                                        <a href="<?php echo Yii::app()->createUrl('site/kesim')?>/<?php echo $id ?>" >
                                                                           <span class="label label-success">Kesim Yap</span> </a>
                                                                    
                                                            </td>
								
                                                            <td><?php echo $ad_soyad;?></td>
                                                                <td class="center"><?php echo $bagis_tip_ismi ; ?></td>
                                                                <td class="center"><?php echo $kurban_adet ?></td>
							</tr>
                                                      <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
