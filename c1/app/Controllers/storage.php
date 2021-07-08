<?php

require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Storage\Bucket;
use Google\Cloud\Storage\StorageClient;


class storage extends c1_controller
{
    private  $projectId;
    private $storage;
    public function __construct()
    {
        putenv("GOOGLE_APPLICATION_CREDENTIALS=C:\\xampp\htdocs\\google-cloud\\credential\\My First Project-24eb30f8a092.json");
        $this->projectId = 'applied-summer-306309';
        $this->storage = new StorageClient([
            'projectId' => $this->projectId
        ]);
    }
    public function createBucket($bucketName)
    {

        $bucket = $this->storage->createBucket($bucketName);
        echo 'Bucket ' . $bucket->name() . 'created.';
    }
    public function listbucket()
    {
        $buckets = $this->storage->buckets();
        foreach ($buckets as $bucket) {
            echo $bucket->name() . PHP_EOL;
        }
    }
    function upload_object($bucketName, $objectName, $source)
    {
        $storage = new StorageClient();
        $file = fopen($source, 'r');
        $bucket = $storage->bucket($bucketName);
        $object = $bucket->upload($file, [
            'name' => $objectName
        ]);
        printf('Uploaded %s to gs://%s/%s' . PHP_EOL, basename($source), $bucketName, $objectName);
    }
    function list_objects($bucketName)
    {
        $storage = new StorageClient();
        $bucket = $storage->bucket($bucketName);
        foreach ($bucket->objects() as $object) {
            printf('Object: %s' . PHP_EOL, $object->name());
        }
    }
    function delete_object($bucketName, $objectName, $options = [])
    {
        $storage = new StorageClient();
        $bucket = $storage->bucket($bucketName);
        $object = $bucket->object($objectName);
        $object->delete();
        printf('Deleted gs://%s/%s' . PHP_EOL, $bucketName, $objectName);
    }
}