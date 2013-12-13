<?php

namespace Trek;

class FileBasedVersionManager implements VersionManagerInterface
{
    
    /**
     * The default version file name.
     * 
     * @var string
     */
    const VERSION_FILE = 'version';

	private $dir;

	public function __construct($dir) {
        // the directory must exist
        if (!is_dir($dir)) {
            throw new InvalidArgumentException('The directory "' . $dir . '" does not exist.');
        }
        
        // the directory must be writable
        if (!is_writable($dir)) {
            throw new RuntimeException(
                'The directory "' . $dir . '" must be writable in order to track versions.'
            );
        }
        
        // resolve the path
        $this->dir = realpath($dir);
	}

	public function current() {
        $file = $this->getVersionFile();
        if (file_exists($file)) {
            return new Version(file_get_contents($file));
        }
        return new Version;
    }

	public function bump($version) {		
        return file_put_contents($this->getVersionFile(), (string) $version);
	}

	public function isVersioned() {
        return file_exists($this->getVersionFile());
	}
    
    /**
     * Returns the path to the version file.
     * 
     * @return string
     */
    private function getVersionFile()
    {
        return $this->dir . DIRECTORY_SEPARATOR . self::VERSION_FILE;
    }
}