<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8" />
                <title>Dropzone.js - Bootstrap后台管理系统模版Ace下载</title>
                
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

                <meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
                <meta name="description" content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
                <!-- basic styles -->
        
                <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
                <link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
        
                <!-- page specific plugin styles -->
        
                <link rel="stylesheet" href="../assets/css/dropzone.css" />
        
                <!-- fonts -->
        
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
        
                <!-- ace styles -->
        
                <link rel="stylesheet" href="../assets/css/dropzone_2.css" />
                <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
                <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    
            </head>
            <body>
                    <div class="row">
                            <div class="col-md-12">
                                <h1 class="page-header">
                                    学籍批量导入<small>请选择文件（学籍表）：</small>
                                </h1>
                            </div>
                        </div>

                    <div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div id="dropzone">
									<form action="load_stu_info_save.php" method="post"  enctype="multipart/form-data"  class="dropzone">
										<div class="fallback">
											<input name="file" type="file" multiple="" />
										</div>
									</form>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
                        </div><!-- /.row -->

                        
                        <script type="text/javascript">
                            window.jQuery || document.write("<script src='../assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
                        </script>
                
                
                        <script type="text/javascript">
                            if("ontouchend" in document) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
                        </script>
                        <script src="../assets/js/bootstrap.min.js"></script>
                
                        <!-- page specific plugin scripts -->
                
                        <script src="../assets/js/dropzone.min.js"></script>
                
                        <!-- ace scripts -->
                

                        <script type="text/javascript">
                            jQuery(function($){
                            
                            try {
                              $(".dropzone").dropzone({
                                paramName: "file", // The name that will be used to transfer the file
                                maxFilesize: 5, // MB
                              
                                addRemoveLinks : true,
                                dictDefaultMessage :
                                '<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> Drop files</span> to upload \
                                <span class="smaller-80 grey">(or click)</span> <br /> \
                                <i class="upload-icon icon-cloud-upload blue icon-3x"></i>'
                            ,
                                dictResponseError: 'Error while uploading file!',
                                
                                //change the previewTemplate to use Bootstrap progress bars
                                previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
                              });
                            } catch(e) {
                              alert('Dropzone.js does not support older browsers!');
                            }
                            
                            });
                        </script>
            </body>
</html>