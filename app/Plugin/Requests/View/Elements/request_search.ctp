<?php
	$type=isset($type)?$type:'home';
	$num_array=array();
	for($i=1;$i<=16;$i++) {
		if($i == 16) {
			$num_array[$i]=$i . '+';
		} else {
			$num_array[$i]=$i;
		}
	}
	if (isset($search_keyword['named']['from'])) {
            $this->request->data['Request']['from'] = $search_keyword['named']['from'];
        }
	if (isset($search_keyword['named']['to'])) {
		$this->request->data['Request']['to'] = $search_keyword['named']['to'];
	}
	if (isset($search_keyword['named']['is_flexible']) && $search_keyword['named']['is_flexible']) {
		$this->request->data['Request']['is_flexible'] = $search_keyword['named']['is_flexible'];
	}
?>
	<?php echo $this->Form->create('Request', array('class' => 'js-search', 'action'=>'index', 'enctype' => 'multipart/form-data'));?>
	<section class="row ver-space no-mar">
        <div class="span10 no-mar ver-space">
          <div class="clearfix ver-space dc"> <span class="top-space top-smspace show pull-left mob-clr"><i class="icon-map-marker text-24 top-space hor-mspace pull-left mob-clr"></i></span>
            <div class="form-search bot-mspace ">
              <div class="result-block">
                 <?php echo $this->Form->input('Request.cityName', array('id'=>'RequestCityName','class'=>'span9 ver-mspace','placeholder'=>__l('Where?'),'label' =>false)); ?>
				  <?php
					echo $this->Form->input('Request.latitude', array('id' => 'latitude', 'type' => 'hidden'));
					echo $this->Form->input('Request.longitude', array('id' => 'longitude', 'type' => 'hidden'));
					echo $this->Form->input('Request.ne_latitude', array('id' => 'ne_latitude', 'type' => 'hidden'));
					echo $this->Form->input('Request.ne_longitude', array('id' => 'ne_longitude', 'type' => 'hidden'));
					echo $this->Form->input('Request.sw_latitude', array('id' => 'sw_latitude', 'type' => 'hidden'));
					echo $this->Form->input('Request.sw_longitude', array('id' => 'sw_longitude', 'type' => 'hidden'));
					echo $this->Form->input('Request.type', array( 'value' =>'search', 'type' => 'hidden'));
				  ?> 
					<div id="mapblock" class="pa">
						<div id="mapframe">
							<div id="mapwindow"></div>
						</div>
					</div>
              </div>
              <span class="span space show top-mspace mob-no-mar"> 
				  <span class="ver-space show checkbox ver-mspace mob-no-mar">
				  <?php echo $this->Form->input('Request.is_flexible', array('label' => false, 'div' => false,'type' => 'checkbox', 'checked' => !empty($this->request->data['Request']['is_flexible']) ? 'checked' : '')); ?>
				  <label class="checker-img dl graydarkerc text-11" for="RequestIsFlexible">
				  <?php echo __l('Include non-'); ?><span class="label"><?php echo __l('exact'); ?></span> <span class=""><?php echo __l('matches(recommended)'); ?></span></label>
				  </span> 
			  </span>
              <div class="submit pull-right right-space ver-space top-space ver-mspace mob-no-pad mob-no-mar">
				<?php echo $this->Form->submit(__l('Search'), array('id' => 'js-sub', 'class' => 'btn btn-large hor-mspace btn-primary textb top-mspace text-16' ,'disabled' => 'disabled'));?>
              </div>
            </div>
          </div>
        </div>
        <div class="span14">
		
			  <div class="nav-tabs no-bor ver-smspace clearfix">
				<ul id="myTab" class="row unstyled no-mar text-11 pull-right">
				  <li class="pull-left no-mar active">
				  <a title="<?php echo __l('Calendar'); ?>" data-toggle="tab" href="#" class="no-under js-show-search-calendar"><?php echo __l('Calendar'); ?></a>
				 </li>
				  <li class="pull-left hor-smspace">/</li>
				  <li class="pull-left ">
					<a title="<?php echo __l('Dropdown'); ?>" data-toggle="tab" href="#" class="no-under js-show-search-dropdown"><?php echo __l('Dropdown'); ?></a>
				  </li>
				</ul>
			  </div>
			<div class="tab-content" id="myTabContent"> 
				<div class="clearfix pull-right mob-clr dc">
					<div id="js-inlineDatepicker-calender" class="<?php echo (Configure::read('item.set_default_calendar_type')  == 'calendar') ? 'hide' : null; ?>">
						<div class="input select clearfix textb">
								<?php echo $this->Form->input('Request.from',array('div'=>false,'class'=>'span3','label' => __l('From'), 'type' => 'date' ,'minYear'=>date('Y'), 'maxYear'=>date('Y')+1, 'orderYear' => 'asc')); ?>
						
						</div>
						<div class="clearfix top-mspace">
							 
								<?php echo $this->Form->input('Request.to',array('div'=>false,'class'=>'span3','label' => __l('To'), 'type' => 'date','minYear'=>date('Y'), 'maxYear'=>date('Y')+1, 'orderYear' => 'asc'));		?>
							
						</div>
					</div>
					<div id="js-inlineDatepicker" class="<?php echo (Configure::read('item.set_default_calendar_type')  == 'dropdown') ? 'hide' : null; ?>"></div>
						<div class="span14 no-mar dr grayc text-11">
							<span class="js-date-picker-info <?php echo (Configure::read('item.set_default_calendar_type')  == 'dropdown') ? 'hide' : null; ?>"></span>
						</div>
					</div>
				</div>
			</div>
		
     </section>
	<?php echo $this->Form->end();?>