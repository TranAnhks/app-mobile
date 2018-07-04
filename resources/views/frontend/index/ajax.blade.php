<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="beta-products-details">
  		<p class="pull-left">{{count($new_product)}} {{ trans('user/mobile.timsanpham')}}</p>
  </div>
</div>
 
@foreach($new_product as $new)
    <a href="{!!url('mobile/'.$new->id)!!}"  >
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="thumbnail">   
                <div class="img-box">
                    <img class="img-mobile" src="{!!url('./uploads/products/'.$new->images)!!}" alt="{!!$new->name!!}">
                </div>

                <div class="caption">
                    <h3 >{!!$new->name!!}</h3>
                    <h4>{!!number_format($new->price)!!}₫</h4>    
                    <li><strong>CPU</strong> : {!!$new->cpu!!} </li>
                    <li><strong>Màn Hình</strong> : {!!$new->screen!!}</li> 
                    <li><strong>Camera:</strong> trước {!!$new->cam1!!} ; sau : {!!$new->cam2!!}</li> 
                    <li><strong>HĐH</strong> : {!!$new->os!!} </li>  
                    <li><strong>Bộ nhớ trong</strong> : {!!$new->storage!!} </li>
                    <li><strong>Pin</strong> : {!!$new->pin!!}</li>
                    <br>
                </div>

                <div class="btnbuy">
                    <a href="{!!url('mobile/'.$new->id)!!}" class="btn btn-default btnct" role="button">{{ trans('user/mobile.chitiet')}}</a> 
                    <a href="{!!url('cart/addcart/'.$new->id)!!}" class="btn btn-default btnthem">{{ trans('user/mobile.themvaogio')}}</a>
                </div>

            </div>
        </div>
    </a>
@endforeach
<div class="col-md-12">
	{!!$new_product->links();!!}
</div>
 