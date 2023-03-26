<?php

Class Directories{
    
    public function addDirectory($post){
    
        if(isset($post['submit'])){
        
        $directoryName = $post['directoryname'];
        
            if(!is_dir('directories/' . $directoryName)){
            
                if(mkdir('directories/' . $directoryName)){
                
                    $path = 'directories/' . $directoryName . "/";
                
                    $file = fopen($path . "readme.txt","w");
                
                    if(!fwrite($file, $post['filecontent'])){
                        fclose($file);
                        $acknowledgement = "<p>File could not be created</p>";
                    }
                    else {
                        $acknowledgement = "<p>File and directory where created</p>";
                        $filePath = "<p><a href='directories/{$directoryName}/readme.txt'>Path were file is located</a></p>";
                        return $acknowledgement.$filePath;
                    }
                }
                else {
                    $acknowledgement = "<p>Error: Directory could not be made.</p>";
                    return $acknowledgement;
                }
            
            }
            else {
                    $acknowledgement = "<p>A directory already exits with that name.</p>";
                    return $acknowledgement;
            }

        }
    }
}
  
?>