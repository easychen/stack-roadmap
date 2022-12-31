<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see https://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
    public function copyImages( $file_path = null )
    {
        if( !$file_path ) $file_path = $this->ask('请输入要复制图片的md文档路径');
        if( !file_exists($file_path) )
        {
            $this->say('文件不存在');
            return;
        }
        // get image path from markdown file
        $content = file_get_contents($file_path);
        if(preg_match_all('/!\[.*\]\((.*)\)/', $content, $matches))
        {
            $image_path = $matches[1];
            // if not start with http, then copy it to current path
            foreach($image_path as $path)
            {
                if( !preg_match('/^http/', $path) )
                {
                    $from_path = dirname($file_path).'/'.$path;
                    $to_path = __DIR__.'/src/'.$path;
                    $this->_copy($from_path,$to_path);
                    echo basename( $path )." ⭕️ \r\n";
                }
            }
        }
        $this->say('🎉 Done');
    }

    public function copyImage2( $file_path = null )
    {
        if( !$file_path ) $file_path = $this->ask('请输入要复制图片的md文档路径');
        if( !file_exists($file_path) )
        {
            $this->say('文件不存在');
            return;
        }
        // get image path from markdown file
        $content = file_get_contents($file_path);
        if(preg_match_all('/!\[.*\]\((.*)\)/', $content, $matches))
        {
            $image_path = $matches[1];
            // if not start with http, then copy it to current path
            foreach($image_path as $path)
            {
                if( !preg_match('/^http/', $path) )
                {
                    $from_path = '/Users/easy/Code/gitcode/lean-side-bussiness/src/'.$path;
                    $to_path = __DIR__.'/src/'.$path;
                    $this->_copy($from_path,$to_path);
                    echo basename( $path )." ⭕️ \r\n";
                }
            }
        }
        $this->say('🎉 Done');
    }
}