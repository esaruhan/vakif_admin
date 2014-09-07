<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->homeUrl?>"><i class="icon-home"></i><span
								class="hidden-tablet"> Dashboard</span> </a></li>
						<?php foreach (Main::adminmenu() as $key=>$menu){
							echo '<li><a class="ajax-link" href="'.Yii::app()->createUrl($menu['url']['0']).'"><i class="icon-home"></i><span
								class="hidden-tablet"> '.$menu['label'].'</span> </a></li>';
						}?>			
                                                <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/table')?>"><i
								class="icon-align-justify"></i><span class="hidden-tablet">
									Bağış Yapanlar</span> </a></li>
                                               <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/kurban')?>"><i
								class="icon-align-justify"></i><span class="hidden-tablet"> Kurban Bağışı Yapanlar</span>
						</a>
                                               </li>
                                               <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/basarisiz')?>"><i
								class="icon-align-justify"></i><span class="hidden-tablet"> Başarısız Bağış Yapanlar</span>
						</a>
                                               </li>
                                                
                                                <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/mesaj')?>"><i
								class="icon-envelope"></i><span class="hidden-tablet">
									Bağış Esnasında Mesaj Atanlar</span> </a>
                                                </li>
				                
                                                <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/iletisimliste')?>"><i
								class="icon-envelope"></i><span class="hidden-tablet">
									Vakfa İletişime Geçenler</span> </a>
                                                </li>
                                                
                                                <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/gonderilensms')?>"><i
								class="icon-envelope"></i><span class="hidden-tablet">
									Gönderilen SMS Durumları</span> </a>
                                                </li>
                                                
                                                <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/smsgonder')?>"><i
								class="icon-envelope"></i><span class="hidden-tablet">
									SMS Gönderme</span> </a>
                                                </li>     
                                                <li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/kurbantakip')?>"><i
								class="icon-align-justify"></i><span class="hidden-tablet"> Kurban Takip</span>
						</a>
                                               </li>
						<li><a class="ajax-link" href="<?php echo Yii::app()->createUrl('site/index/view/chart')?>"><i
								class="icon-list-alt"></i><span class="hidden-tablet"> Grafikler</span>
						</a></li>
					
                                                
                                                                        
						<?php /* 
						<li><a href="<?php echo Yii::app()->createUrl('site/index/view/error')?>"><i class="icon-ban-circle"></i><span
								class="hidden-tablet"> Error Page</span> </a></li>
						<li><a href="<?php echo Yii::app()->createUrl('site/index/view/login')?>"><i class="icon-lock"></i><span
								class="hidden-tablet"> Login Page</span> </a></li> */?>
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input
						id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div>
				<!--/.well -->
			</div><!--/span-->