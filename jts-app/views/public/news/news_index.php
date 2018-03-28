<script type="text/javascript">
$(function() {
	$('.datepicker').datepicker({
		dateFormat: 'dd/mm/yy' 
	});
});
</script>
<div id="landing_2">
	<div class="container-960">

		<div class="innerT">
			<div class="row-fluid">
				<div class="span3">
					<!-- Widget -->

					<div class="widget widget-heading-simple widget-body-gray">
						
						<!-- Widget Heading -->
						<div class="widget-head">
							<h4 class="heading glyphicons folder_open"><i></i>Index <?=$menu['menu_title']?></h4>
						</div>
						<!-- // Widget Heading END -->
						
						<div class="widget-body list grey">						
							<ul>
								<?php foreach($list_category as $cat):?>
								<li><a href="<?=site_url('web/news'.$cat['menu_url'])?>" title="<?=$cat['menu_title']?>"><?=slice_text($cat['menu_title'],20)?> <span class="count-post">(<?=$cat['count_post']?> artikel)</span></a></li>
								<?php endforeach;?>
							</ul>
						</div>
					</div>

					<div class="widget widget-heading-simple widget-body-white">
							
						<!-- Widget Heading -->
						<div class="widget-head">
							<h4 class="heading glyphicons list"><i></i>Arsip <?=$menu['menu_title']?></h4>
						</div>
						<!-- // Widget Heading END -->
						
						<div class="widget-body list">						
							<!-- List -->
							<?php if(count($arsip_news) > 0):?>
							<ul>
								<?php foreach($arsip_news as $arsip):?>
								<li>
									<a href="<?=site_url('web/news/'.$arsip['menu_url'].'/archive?year='.$arsip['tahun'].'&month='.$arsip['bulan'])?>"><?=bulan($arsip['bulan'])?> <?=$arsip['tahun']?></a>
									<span class="badge"><?=$arsip['count_post']?></span>
								</li>
								<?php endforeach;?>
							</ul>
							<?php else:?>
							<ul>
								<li>Data tidak ditemukan.</li>
							</ul>
							<?php endif;?>
							<!-- // List END -->							
						</div>
					</div>

					<?php if($config['is_news_popular'] == '1'):?>
					<?=$this->load->view('public/widget/widget-news-popular');?>
					<?php endif;?>

					<?php if($config['is_polling'] == '1'):?>
					<?=$this->load->view('public/widget/widget-polling');?>
					<?php endif;?>
					
					<!-- // Widget END -->
				</div>
				<div class="span9">
					
						<div class="widget widget-heading-simple widget-body-white">
							<div class="widget-head"><h4 class="heading glyphicons search"><i></i> Pencarian</h4></div>
							<div class="widget-body">
								<div class="row-fluid">	
									<div class="span12">
										<form name="form-search" method="get" action="<?=site_url('web/news_index')?>">
										<table width="100%">
										<tr>
											<td width="20%"><div class="span12">Kata Kunci</div></td>
											<td width="80%"><div class="span12"><input type="text" name="search_news" class="span12" value="<?=$search_news?>" placeholder="Masukan kata kunci pencarian ..."></div></td>
										</tr>
										<tr>
											<td><div class="span12">Tanggal</div></td>
											<td>
												<div class="span8">
													<input type="text" name="search_date_start" class="span4 datepicker" value="<?=$search_date_start?>" placeholder="Tanggal Mulai"> s.d 
													<input type="text" name="search_date_end" class="span4 datepicker" value="<?=$search_date_end?>" placeholder="Tanggal Selesai">
												</div>
											</td>
										</tr>
										</table>
										<div class="right" style="margin-top:10px">
											<button class="btn btn-primary btn-icon btn-submit"><i></i> Cari Berita</button>
											<a href="<?=site_url('web/news_index')?>" class="btn btn-secondary btn-icon"> Batalkan</a>
										</div>
										</form>
									</div>
								</div>
							</div>
							<div class="separator bottom"></div>

							<div class="widget-head"><h4 class="heading glyphicons list"><i></i> Arsip <?=$menu['menu_title']?> <span style="font-size:11px">Terdapat <?=count($list_news)?> artikel</span></h4></div>
							<?php if(count($list_news) == 0):?>
							<div class="widget-body">
								<div class="row-fluid">	
									<div class="span12">
										Data tidak ditemukan !
									</div>
								</div>
							</div>
							<?php endif;?>
							<div class="widget-body">								
								<div class="row-fluid">	
									<div class="span12">
										<?php foreach($list_news as $news):?>
										<h4 class=""><a href="<?=site_url('web/read/'.$news['menu_url'].'/'.$news['post_url'])?>"><?=$news['post_title']?></a></h4>										
										<span class="glyphicons single regular user"><i></i> <?=$news['author_name']?></span>
										<span class="glyphicons single regular calendar"><i></i> <?=convert_date_indo($news['post_date'])?></span>
										<span class="glyphicons single regular camera"><i></i> dibaca <?=$news['post_hit']?> kali</span>
										<span class="glyphicons single regular book"><i></i> kategori : <?=$news['category_name']?></span>
										<p><?=word_limiter(strip_tags($news['post_content']),50)?></p>	
										<p class="margin-none strong" style="padding-bottom:10px">
											<a href="<?=site_url('web/read/'.$news['menu_url'].'/'.$news['post_url'])?>" class="glyphicons single chevron-right"><i></i>selengkapnya</a>
										</p>									
										<div class="separator bottom" style="border-top:1px solid #ccc; padding-bottom:10px"></div>
										<?php endforeach;?>
									</div>
								</div>
							</div>
							<div class="separator bottom"></div>


							<div class="pagination center">
								<ul>
									<?php if($paging->start_link): ?>
					                    <li><a href="<?=site_url("web/news_index/$paging->c_start_link/$o".$params) ?>">First</a></li>
					                <?php endif; ?>
					                <?php if($paging->prev): ?>
					                    <li><a href="<?=site_url("web/news_index/$paging->prev/$o".$params) ?>">Prev</a></li>
					                <?php endif; ?>

					                <?php for($i = $paging->c_start_link; $i <= $paging->c_end_link; $i++): ?>
					                	<li <?php jecho($p, $i, "class='active'") ?>><a href="<?=site_url("web/news_index/$i/$o".$params) ?>"><?=$i ?></a></li>
					                <?php endfor; ?>

					                <?php if($paging->next): ?>
					                    <li><a href="<?=site_url("web/news_index/$paging->next/$o".$params) ?>">Next</a></li>
					                <?php endif; ?>
					                <?php if($paging->end_link): ?>
					                    <li><a href="<?=site_url("web/news_index/$paging->c_end_link/$o".$params) ?>">Last</a></li>
					                <?php endif; ?>
								</ul>
							</div>

						</div>

					</div>
			</div>
		</div>

		<div class="separator bottom"></div>
		
	</div>
</div>
