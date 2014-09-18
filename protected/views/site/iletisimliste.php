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
                                                                  <th>Durum</th>
								  <th>Ad-Soyad</th>
                                                                  <th>Konu</th>
                                                                  <th>Mail</th>
                                                                  <th>Telefon</th>
								  <th>Tarih</th>
                                                                  <th>İlk Okuyan</th>
                                                                  <th>Cevap Veren</th>
                                                                  <th>Cevap Tarihi</th>
                                                                  <th>Cevap Durum</th>
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
                                                          
                                                          $cevap_durum              = $record->cevap_durum;
                                                          $cevap_veren_admin_id     = $record->cevap_veren_admin_id;
                                                          $cevap_tarih              = $record->cevap_tarih;
                                                          $okuyan_admin_id          = $record->okuyan_admin_id;
                                                          
                                                          
                                                          $admin_cevap_veren_record = NULL;
                                                          $okuyan_admin_record      = NULL;
                                                          
                                                          if(is_null($cevap_veren_admin_id) != 1 && isset($cevap_veren_admin_id)== 1 && empty($cevap_veren_admin_id)!= 1 )
                                                          {      
                                                              $admin_cevap_veren_record = User::model()->findByPk($cevap_veren_admin_id);
                                                          }
                                                          if(is_null($okuyan_admin_id) != 1 && isset($okuyan_admin_id)== 1 && empty($okuyan_admin_id)!= 1 )
                                                          {
                                                            $okuyan_admin_record      = User::model()->findByPk($okuyan_admin_id);
                                                          }
                                                          $label                    = Data::getMesajDurum($okundu);
                                                          $cevap_durum_label        = Data::getCevapDurum($cevap_durum);
                                                          
                                                      ?>
                                                      
                                                      
                                                        <tr>
								<td><?php echo $ad_soyad;?></td>
                                                                <td><?php echo $konu;?></td>
                                                                <td><?php echo $email;?></td>
                                                                <td><?php echo $telefon;?></td>
								<td class="center"><?php echo $tarih ;?> </td>
                                                                <td class="center">
                                                                    <?php 
                                                                            if($okuyan_admin_record != NULL) 
                                                                                echo $okuyan_admin_record->name.' '.$okuyan_admin_record->surname; 
                                                                            else echo '-';
                                                                     ?>
                                                                </td>
                                                                <td class="center">
                                                                    <?php 
                                                                            if($admin_cevap_veren_record != NULL) 
                                                                                echo $admin_cevap_veren_record->name.' '.$admin_cevap_veren_record->surname; 
                                                                            else echo '-';
                                                                     ?>
                                                                </td>
								<td class="center"><?php echo $cevap_tarih ;?> </td>
                                                                <td class="center">
                                                                    <span class="label <?php echo $cevap_durum_label['label'];  ?>">
                                                                        <?php echo $cevap_durum_label['durum'];  ?>
                                                                    </span>
                                                                </td>
                                                                <td class="center">
                                                                    <span class="label <?php echo $label['label'];  ?>">
                                                                        <a href="<?php echo Yii::app()->createUrl('site/oku')?>/<?php echo $id ?>" ><?php echo $label['durum'];  ?></a>
                                                                    </span>
                                                                </td>
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

			
