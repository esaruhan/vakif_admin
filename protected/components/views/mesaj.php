		<?php 
                
                        $posts = Data::getMesajAtanlar();
                
                ?>	
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Mesaj Atanlar </h2>
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
                                                                  <th>Vakfa Mesaj</th>
								  <th>Bağış Tarih</th>
                                                                  <th>Telefon</th>
                                                                  <th>E-Mail</th>
								  <th>Bağış Tipi</th>
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
                                                          $bagis_zamani             = $record->bagis_zamani;
                                                          $durum                    = $record->durum;
                                                          $bagis_tip_ismi           = Data::getBagisTipi($bagis_tip);
                                                          $label                    = Data::getLabelData($bagis_tip);
                                                          $durum_label              = Data::getDurum($durum);
                                                      ?>
                                                        <?php if(!empty($mesaj)) { ?>
                                                                <td>
                                                                    <span class="label <?php echo $durum_label['label'];  ?>"><?php echo $durum_label['durum'];  ?></span>
                                                                </td>
								<td><?php echo $ad_soyad;?></td>
                                                                <td><?php echo $mesaj;?></td>
								<td class="center"><?php echo $bagis_zamani ;?> </td>
                                                                <td class="center"><?php  echo $telefon;?></td>
                                                                <td class="center"><?php  echo $email;?></td>
                                                                <td class="center">
                                                                    <span class="label <?php echo $label['label'];  ?>"><?php echo $label['bagis'];  ?></span>
                                                                </td>
							</tr>
                                                      <?php } ?>
                                                      <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
