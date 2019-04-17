<?php 
class Resource 
{	
	public function isFolder($dir, $entry)
	{
		
			echo '<li><i class="fa fa-folder-open" aria-hidden="true"><a>'.$entry.'</a></i></li>';
			echo '<ul>';
			if($handle = opendir($dir))
			{
					while ($entry2 = readdir($handle)) {
						if(!in_array($entry2, array(".",".."))){
							$dir2 = $dir. '/' .$entry2;

							if(is_dir($dir2))
							{
								
								$this->isFolder($dir2,$entry2);
							}
							else
							{
								echo '<li><i class="fa fa-file" aria-hidden="true"><a>'.$entry2.'</a></i></li>';
							}

						}
					}
			}
			closedir($handle);
			echo '</ul>';
	}
	public function dirToArray($dir) {
		$filelist = array();
		try{
				if($handle = opendir($dir)) 
				{

					while($entry = readdir($handle))
					{

						if(!in_array($entry,array(".","..")))
						{
							
							$dir2 = $dir.'/'.$entry;
							if(is_dir($dir2))
							{
								
								$this->isFolder($dir2, $entry);
							}
							else
							{
								echo '<li><i class="fa fa-file" aria-hidden="true"><a>'.$entry.'<a/></i></li>';
							}

						}
					}
				}
				closedir($handle);		
			}catch(Exception $e)
			{
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		
		return null;

	}
}