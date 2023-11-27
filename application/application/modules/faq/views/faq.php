<div class="col-md-12 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">        
        <div class="portlet-body form">
            <form id="faq_form" role="form" method="post" action="<?php echo base_url('faq/add_faq'); ?>">
                <div class="form-body">
                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">                            
                            <input name="title" type="text" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Question</label>
                        <div class="input-group">                            
                            <textarea name="question" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <textarea name="answer" class="form-control" rows="3" id="ck1"></textarea>
                    </div>                    
                </div>
                <div class="form-actions">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    <input type="reset" name="cancle" value="Cancle" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->    
    
</div>
<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
<script>


        $(document).ready(function()
        {
                CKEDITOR.replace("ck1");


                $("#faq_form").on('submit',(function(e)
                { 
                       e.preventDefault();
                    //  alert(new FormData(this));
               
                $.ajax({
                url: "<?php echo base_url().'faq/add_faq'; ?>",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){ 

                 if(data == 1)
                 {
                     alert('Data Inserted Successfully');  
                     $("#faq_form")[0].reset(); 
                     CKEDITOR.instances.ck1.setData('');       
                 }
                },
                error: function(){}             
                });
                }));
});

</script>