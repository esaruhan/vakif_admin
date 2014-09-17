		<?php 
                
                        $posts = Data::getYurtdisiKurbanBagisiYapanlar();
                
                ?>	
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Yurtdışı Kurban Bağış Yapanlar</h2>
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
								  <th>Ad-Soyad</th>
								  <th>Bağış Tarih</th>
                                                                  <th>Telefon</th>
                                                                  <th>E-Mail</th>
                                                                  <th>Kurban Adet</th>
                                                                  <th>Bağış Miktar ( TL )</th>
								  <th>Kesim Durumu</th>
                                                                  <th>Kesildiği Tarih</th>
                                                                  <th>Resim</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      <?php foreach ($posts as &$record) { 
                                                          
                                                          $id                       = $record->id;
                                                          $ad_soyad                 = $record->ad_soyad;
                                                          $email                    = $record->email;
                                                          $telefon                  = $record->telefon;
                                                          $mesaj                    = $record->mesaj;
                                                          $bagis_tutar              = $record->bagis_tutar;
                                                          $bagis_zamani             = $record->bagis_zamani;
                                                          $kurban_kesim_durum       = $record->kurban_kesim_durum;
                                                          $kurban_adet              = $record->kurban_adet;
                                                          $kurban_kesim_tarih       = $record->kurban_kesim_tarih;
                                                          $kurban_resim_url         = $record->kurban_resim_url;
                                                          
                                                          $label                    = Data::getKurbanDurum($kurban_kesim_durum);
                                                      ?>
							<tr>
								<td><?php echo $ad_soyad;?></td>
								<td class="center"><?php echo $bagis_zamani ;?> </td>
                                                                <td class="center"><?php  echo $telefon;?></td>
                                                                <td class="center"><?php  echo $email;?></td>
                                                                <td class="center"><?php  echo $kurban_adet;?></td>
                                                                <td class="center"><?php echo $bagis_tutar ?></td>
                                                                
                                                                <td class="center">
                                                                    <span class="label <?php echo $label['label'];  ?>"><?php echo $label['durum'];  ?></span>
                                                                </td>
                                                                <td class="center"><?php echo $kurban_kesim_tarih ?></td>
                                                                <td class="center"><?php echo $kurban_resim_url ?></td>
                                                                
							</tr>
                                                      <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
