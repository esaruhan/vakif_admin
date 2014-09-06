<!--
			<div class="row-fluid sortable">
				
				<div class="box">
					<div class="box-header well">
						<h2><i class="icon-list-alt"></i> Burs Grafiği ( Ay / Burs Miktarı )</h2>
						<div class="box-icon">
							<a href="<?php echo Yii::app()->createUrl('site/iletisimliste')?>" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            <?php  
                                                        
//                                                    $this->Widget('ext.highcharts.HighchartsWidget', array(
//                                                       'options'=>array(
//                                                          'title' => array('text' => 'Fruit Consumption'),
//                                                          'xAxis' => array(
//                                                             'categories' => array('Apples', 'Bananas', 'Oranges')
//                                                          ),
//                                                          'yAxis' => array(
//                                                             'title' => array('text' => 'Fruit eaten')
//                                                          ),
//                                                          'series' => array(
//                                                             array( 'data' => array(1, 0, 4)),
//                                                          )
//                                                       )
//                                                    ));
                                            
                                            ?>
                                       </div>
				</div>
				

			</div>/row
			
			<div class="row-fluid sortable">
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list-alt"></i> Bağışların Dağılımı</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
							<div id="piechart" style="height:300px"></div>
					</div>
				</div>
				
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list-alt"></i> Anlık Trafik</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="realtimechart" style="height:190px;"></div>
						 <p>You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
						 <p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
					</div>
				</div>
					
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list-alt"></i> Bursların Dağılımı</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="donutchart" style="height: 300px;">
					</div>
				</div>
			</div>  
		</div>/row
		
-->
