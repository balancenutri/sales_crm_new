<?php 

  $super_admin=array('super_admin','super_mentor');
  $mentor_id=$this->session->user_type;
  $check=in_array($mentor_id, $super_admin);

?>

<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}
</style>
<div class="">    
</center>
    <h3>FAQ'S</h3>    
    <br />
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>ID</th>                    
                    <th>Title</th>
                    <th>Type</th>
                    <th>Question</th>
                    <th>Answer</th>
         </tr>
      </thead>
      <tbody>
                <?php $i=1; foreach($faqs_details as $faq){?>
                     <tr>
                         <td><?php echo $i;?></td>
                         <td><?php echo ucwords(strtolower($faq->title));?></td>
                         <td><?php echo ucwords($faq->type);?></td>
                         <td><?php echo $faq->question;?></td>
                         <td><?php echo $faq->answer;?></td>                                
                      </tr>
                     <?php $i++; }?>



      </tbody>
    </table>

  </div>