function loadRegion(sel,type_id,selName,url){
	jQuery("#"+selName+" option").each(function(){
		jQuery(this).remove();
	});
	jQuery("<option value=0>请选择</option>").appendTo(jQuery("#"+selName));
	jQuery.getJSON(url,{pid:jQuery("#"+sel).val(),type:type_id},
		function(data){
			if(data){
				jQuery.each(data,function(idx,item){
					jQuery("<option value="+item.goods_class_id+">"+item.class_name+"</option>").appendTo(jQuery("#"+selName));
				});
			}else{
				jQuery("<option value='0'>请选择</option>").appendTo(jQuery("#"+selName));
			}
		}
	);
}