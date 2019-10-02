
<?php 
   if($this->session->flashdata('true'))
   {
 ?>
   <div class="alert alert-success"> 
     <?php  echo $this->session->flashdata('true'); ?>
<?php    
}
?>
<br>

<a href="<?php echo site_url('paneldashboard'); ?>">Link Title</a> 
<a href="<?php echo site_url('panelskillendorse'); ?>">Skill endorsement</a> 