<div class="container">
    <div class="row">
        <div id="content" class="col-lg-12">
            <!-- PAGE HEADER-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header">
                        <!-- STYLER -->
                        
                        <!-- /STYLER -->
                        <!-- BREADCRUMBS -->
                        <ul class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url();?>"><?php echo get_phrase('home');?></a>
                            </li>
                            <li>
                                <a href=""><?php echo get_phrase('order');?> <?php echo get_phrase('settings');?></a>
                            </li>
                            <li><?=ucwords($page_title)?></li>
                        </ul>
                        <!-- /BREADCRUMBS -->
                        <div class="clearfix">
                            <h3 class="content-title pull-left"><?=ucwords($page_title)?></h3>
                        </div>
                        <div class="description"><?php echo get_phrase('manage_order_settings');?></div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- SAMPLE -->
            <div class="row">
                <div class="col-md-12">
                <?php if($this->session->flashdata('flash_message')){ ?>
                <div class="alert alert-block alert-success fade in">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                <h4><i class="fa fa-heart"></i> <?php echo $this->session->flashdata('flash_message'); ?></h4>
                </div>
                <? }?>
                    <!-- BOX -->
                    <div class="box border red" id="formWizard">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i><?=ucwords($page_title)?></h4>
                            <div class="tools hidden-xs">
                                
                                <a href="javascript:;" class="reload">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="javascript:;" class="collapse">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a href="javascript:;" class="remove">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="box-body form">
           
            			<form method="post" action="<?php echo base_url()?><?=$roles?>/order_settings" class="form-horizontal validate" id="orderSettings">
                        
                               <div class="tab-pane" id="account">
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('order_limit');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              <?php echo form_input('order_limit', (isset($_POST['order_limit']) ? $_POST['order_limit'] : $this->db->get_where('order_settings' , array('type' =>'order_limit'))->row()->description), 'class="form-control tip-right" id="order_limit" data-original-title="'. get_phrase('order_limit') .'" required="required" data-error="' . get_phrase('order_limit') . ' ' . get_phrase("is_required") . '"'); ?>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('default_customer');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                              
											 <?php
                                                $cs[""] = "";
                                                foreach ($customers as $customer) {
													if ($customer['company'] == "-" || !$customer['company']) {
														$cs[$customer['id']] = $customer['company'];
													} else {
														
														$cs[$customer['id']] = $customer['fname'].' '.$customer['lname'];
													}
                                            	}
                                                echo form_dropdown('default_customer', $cs, (isset($_POST['default_customer']) ? $_POST['default_customer'] : $this->db->get_where('order_settings' , array('type' =>'default_customer'))->row()->description), 'id="select4" class="col-md-12 select2-offscreen" required="required" data-error="' . get_phrase("default_customer") . ' ' . get_phrase("is_required") . '"');
                                                ?>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                           <label class="control-label col-md-3"><?php echo get_phrase('display_time');?><span class="required">*</span></label>
                                           <div class="col-md-4">
                                             
                                            <?php
												$displayTime = array('yes' => 'Yes',
																	 'no'  => 'No');
                                                echo form_dropdown('display_time', $displayTime, (isset($_POST['display_time']) ? $_POST['display_time'] : $this->db->get_where('order_settings' , array('type' =>'default_customer'))->row()->description), 'id="select2" class="col-md-12 select2-offscreen" required="required" data-error="' . get_phrase("default_customer") . ' ' . get_phrase("is_required") . '"');
                                                ?>
                                              <span class="error-span"></span>
                                           </div>
                                        </div>
                                        
                                           
                               <div class="form-actions clearfix">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="col-md-offset-3 col-md-9">
                                           
                                         <button type="submit" class="btn btn-primary"> <?php echo get_phrase('save');?> <i class="fa fa-save"></i></button>
                                         <input type="hidden" name="act" value="order_update"  />
                                                                      
                                        </div>
                                     </div>
                                  </div>
                               </div>
                         </form>
                         
                        </div>
                    </div>
                    <!-- /BOX -->
                </div>
            </div>
            <!-- /SAMPLE -->
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-chevron-up"></i> <?php echo get_phrase('top');?>
                </span>
            </div>
        </div><!-- /CONTENT-->
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
		<!------NEW ORDER FORM VALIDATION------> 
		$('#orderSettings').validate({
              rules: {
                order_limit: {
                  required: true,
				  digits:true
				},
				default_customer: {
                  required: true
                },
				display_time: {
                  required: true
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             }); 
});
</script>