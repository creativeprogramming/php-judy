--TEST--
Check for JudyL ins/del/get methods
--SKIPIF--
<?php if (!extension_loaded("judy")) print "skip"; ?>
--FILE--
<?php 
$judy = new JudyL();

// Insert 

echo "Insert 100 index with a rand value\n";
for ($i=0; $i<100; $i++) {
        $value = rand();
        if(!$judy->ins($i, $value))
            echo "Failed to set index $i (value: $value)\n";
}

// Get

echo "Get 100 index\n";
for ($i=0; $i<100; $i++) {
        if($judy->get($i) === null)
            echo "Get index $i returned null\n";
}

// Remove

echo "Remove 100 index\n";
for ($i=0; $i<100; $i++) {
        if(!$judy->del($i))
            echo "Failed to remove index $i\n";
}

// Get

echo "Get 100 index (should be empty)\n";
for ($i=0; $i<100; $i++) {
        if(($v = $judy->get($i)) !== null)
            echo "Get index $i returned $v\n";
}

echo "Done\n";
?>
--EXPECT--
Insert 100 index with a rand value
Get 100 index
Remove 100 index
Get 100 index (should be empty)
Done