		<?php 
                
                        $posts = Data::getIletisimKuranlar();
                        
                        $this->breadcrumbs=array(
                                'Site'=>array('index'),
                                'iletisimliste',
                        );
                
                ?>	
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İletişime Geçenler </h2>
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
                                                                  <th>Konu</th>
                                                                  <th>Mail</th>
                                                                  <th>Telefon</th>
								  <th>Tarih</th>
                                                                  <th>Durum</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      <?php foreach ($posts as &$record) { 
                                                          
                                                          $id                       = $record->id;
                                                          $ad_soyad                 = $record->ad_soyad;
                                                          $email                    = $record->mail;
                                                          $konu                     = $record->konu;
                                                          $mesaj                    = $record->mesaj;
                                                          $tarih                    = $record->tarih;
                                                          $okundu                   = $record->okundu;
                                                          $telefon                  = $record->telefon;
                                                          
                                                          $label                    = Data::getMesajDurum($okundu);
                                                      ?>
                                                        <tr>
								<td><?php echo $ad_soyad;?></td>
                                                                <td><?php echo $konu;?></td>
                                                                <td><?php echo $email;?></td>
                                                                <td><?php echo $telefon;?></td>
								<td class="center"><?php echo $tarih ;?> </td>
                                                                <td class="center">
                                                                    <span class="label <?php echo $label['label'];  ?>">
                                                                        <a href="<?php echo Yii::app()->createUrl('site/oku')?>/<?php echo $id ?>" ><?php echo $label['durum'];  ?></a>
                                                                    </span>
                                                                </td>
							</tr>
                                                      <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
