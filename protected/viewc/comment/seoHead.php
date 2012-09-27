<?php 
if(isset($data['title'])){
	echo '<title>'.$data['title'].'</title>';
}else{
	echo '<title>poprlz</title>';
}
?>

<?php 
if(isset($data['keywords'])){
	echo '<meta name="keywords" content="'.$data['keywords'].'" />';
}else{
	echo '<meta name="keywords" content="keywords" />';
}
?>

<?php 
if(isset($data['description'])){
	echo '<meta name="description" content="'.$data['description'].'" />';
}else{
	echo '<meta name="description" content="description" />';
}
?> 
 
 