<?php 
                
    $posts = Data::getGonderilenSMSler();
                
?>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Gönderilen Mesajlar</h2>
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
								  <th>Numara</th>
								  <th>Gönderilen Tarih</th>
								  <th>Bağış Burs Id</th>
                                                                  <th>Kurecell Id</th>
                                                                  <th>Durum Mesaj</th>
                                                                  <th>Durum</th>
							  </tr>
						  </thead>   
						  <tbody>
                                                      <?php foreach ($posts as &$record) { 
                                                          
                                                          $id                       = $record->id;
                                                          $numara                   = $record->numara;
                                                          $tarih                    = $record->msj_saat;
                                                          $bagis_burs_id            = $record->bagis_burs_id;
                                                          $kurecell_id              = $record->kurecell_id;
                                                          $hata_mesaj               = $record->service_response;
                                                          $durum                    = $record->durum;
                                                          
                                                          $durum_label              = Data::getSMSDurum($durum);
                                                          
                                                          
                                                      ?>
							<tr>
                                                                
								<td><?php echo $numara;?></td>
								<td class="center"><?php echo $tarih ; ?> </td>
                                                                <td class="center"><?php echo $bagis_burs_id ; ?></td>
                                                                <td class="center"><?php  echo $kurecell_id ; ?></td>
                                                                <td class="center"><?php  echo $hata_mesaj ; ?></td>
                                                                <td>
                                                                    <span class="label <?php echo $durum_label['label'];  ?>"><?php echo $durum_label['durum'];  ?></span>
                                                                </td>
							</tr>
                                                      <?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
