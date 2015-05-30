<?php include(APPPATH.'views/common/header.php'); ?>
	<script type="text/javascript" src="public/js/listtable.js"></script>
	<div class="main">
		<div class="main_title"><span class="l">入库管理 &gt;&gt; 入库商品详细</span> &nbsp;单号：<?php print $depot_in_info->depot_in_code; ?><span class="r">[ <a href="/depotio/in">返回列表 </a>]</span></div>
		<div class="produce">
		<ul>
	         <li class="p_nosel conf_btn" onclick="location.href='/depotio/edit_in/<?php print $depot_in_info->depot_in_id; ?>'"><span>基础信息</span></li>
	         <li class="p_sel conf_btn" onclick="location.href='/depotio/edit_in_product/<?php print $depot_in_info->depot_in_id; ?>'"><span>入库商品</span></li>
	     </ul>

		<div class="pc base">
		<div id="goodsDiv">
			<table class="dataTable" cellpadding=0 cellspacing=0>
				<tr>
					<td colspan="8" class="topTd"> </td>
				</tr>
				<tr class="row">
					<th width="280px">商品款号|商品名称|供应商货号</th>
					<th>品牌</th>
					<th>供应商名称</th>
					<th>售价</th>
					<th>条码</th>
					<th>颜色</th>
					<th>尺码</th>
					<th>批次</th>
					<th>最大入库数</th>
					<th>入库详细</th>
				</tr>
				<?php foreach($goods_list as $row): ?>
				<tr class="row">
					<td><?php print $row->product_sn; ?>&nbsp;|&nbsp;<?php print $row->product_name; ?>&nbsp;|&nbsp;<?php print $row->provider_productcode; ?></td>
					<td><?php print $row->brand_name; ?></td>
					<td><?php print $row->provider_name; ?></td>
					<td><?php print $row->shop_price; ?></td>
					<td><?php print $row->provider_barcode; ?></td>
					<td><?php print $row->color_name.'['.$row->color_sn.']'; ?></td>
					<td><?php print $row->size_name.'['.$row->size_sn.']'; ?></td>
					<td><?php print $row->batch_code; ?></td>
					<td><?php print $row->max_num; ?></td>
					<td>
					<?php foreach($row->item as $item): ?>
					<p id="product_p_<?php print $item->depot_in_sub_id; ?>"><?php print $item->depot_name; ?>--<?php print $item->location_name; ?>:
					&nbsp;&nbsp;<?php print $item->product_number; ?>
					</p>
					<?php endforeach; ?>
					</td>

				</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="8" class="bottomTd"> </td>
				</tr>
			</table>
			<div class="blank5"></div>
		</div>
	</div></div></div>
	<input type="hidden" name="depot_in_id" id="depot_in_id" value="<?php print $depot_in_info->depot_in_id; ?>" />
<?php include_once(APPPATH.'views/common/footer.php'); ?>