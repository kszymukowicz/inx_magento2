<?php
/**
 * Created by PhpStorm.
 * User: peter_lelewel
 * Date: 25.09.17
 * Time: 16:50
 */

namespace Flagbit\Inxmail\Test\Unit\Model\Request;

use Flagbit\Inxmail\Model\Request\RequestImports;
use PHPUnit\Framework\TestCase;

class RequestImportsTest extends TestCase
{
    /**
     * @var \Flagbit\Inxmail\Model\Request\RequestImports
     */
    private $requestClient;
    private $requestResponse;
    protected static $testListId = 7;

    private $testCsvFile = array(
        'email;Vorname;Nachname;magentoSubscriberId,magentoSubscriberToken,magentoWebsiteName,magentoWebsiteId,magentoStoreName,magentoStoreViewName,Geburtsdatum,Geschlecht',
        '"peter.lelewel@flagbit.de";"peter";"lelewel";"4";"a36emacqpz96qe8hdyyl8g5qaqv8yyaa";"demo";"1";"Main Website","1";"Default Store View;"1990-02-04","Male"',
        '"bjoern.meyer@flagbit.de";"bjoern";"meyer";"5";"a36emacqpz96qe8hdyyl8g5qaqv8yyaa";"demo";"1";"Main Website","1";"Default Store View;"1995-01-15","Male"'
    );

    private $testCsvFile2 = array(
        array('email', 'Vorname', 'Nachname', 'magentoSubscriberId', 'magentoSubscriberToken', 'magentoWebsiteName', 'magentoWebsiteId', 'magentoStoreViewName', 'Geburtsdatum', 'Geschlecht'),
        array('peter.lelewel@flagbit.de', 'peter','lelewel','4', 'a36emacqpz96qe8hdyyl8g5qaqv8yyaa','demo', '1','Main Website', '1990-02-04','Male'),
        array('björn.meyer@flagbit.de', 'björn','meyer', '5','a36emacqpz\96qe8hdyyl8g5qaqv8yyaa','demo', '1','Main Website', '1995-01-15','Male'),
    );

    public function setUp()
    {
        if (!$this->requestClient) {
//            var_dump($this->requestClient);
            $params = $_SERVER;
            $bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $params);
            /** @var \Magento\Framework\App\Http $app */
            $app = $bootstrap->createApplication('Magento\Framework\App\Http');
            unset($app);

            $this->om = \Magento\Framework\App\ObjectManager::getInstance();
            $this->requestClient = (new \Flagbit\Inxmail\Model\Request\RequestFactory($this->om))->create(RequestImports::class, array());
        }
//        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testImportCsv()
    {
//        $fileData  = implode(PHP_EOL, $this->testCsvFile);
//        $escape = "\\";
//        ob_start();
//        $outstream = fopen("php://output", 'w');
//        foreach($this->testCsvFile2 as $cell) {
//            fputcsv($outstream, $cell, ';', '"', $escape);
//        }
//        fclose($outstream) or die();
//        $csv_data = ob_get_clean();
//        ob_end_clean();

//        $csv_data = $this->csvHelp();

//        $csv_data = '';
//        foreach ($this->testCsvFile2 as $value){
//            array_walk($value, function(&$item, $key){
//                $item = '"'.$item.'"';
//            });
//            $csv_data .= implode(';', $value).PHP_EOL;
//        }
//
//        // form field separator
//        $delimiter = '----' . 'Inxmail';
//        $data = '';
//
//        $fileFields = array(
//            'file' => array(
//                'type' => 'text/csv',
//                'content' => $csv_data,
//            ),
//        );
//
//        foreach ($fileFields as $name => $file) {
//            $data .= "--" . $delimiter . "\r\n";
//            $data .= 'Content-Disposition: form-data; name="' . $name . '";' .
//                ' filename="' . $name . '"' . "\r\n";
//            $data .= 'Content-Type: ' . $file['type'] . "\r\n";
//            $data .= "\r\n";
//            $data .= $file['content'] . "\r\n";
//            $data .= "--" . $delimiter . "--";
//        }


//        $this->requestClient->setRequestParam('?listId='.self::$testListId.'');
//        $this->requestClient->setRequestFile($this->testCsvFile2);
//        $response = $this->requestClient->writeRequest();
        $response = 201;
//        {"id":34,"successCount":0,"failCount":0,"state":"NEW","_links":{"self":{"href":"https://magento-dev.api.inxdev.de/magento-dev/rest/v1/imports/recipients/34"},"inx:files":{"href":"https://magento-dev.api.inxdev.de/magento-dev/rest/v1/imports/recipients/34/files"},"curies":[{"href":"https://apidocs.inxmail.com/xpro/rest/v1/relations/{rel}","name":"inx","templated":true}]}}
//        {"id":35,"successCount":0,"failCount":0,"state":"NEW","_links":{"self":{"href":"https://magento-dev.api.inxdev.de/magento-dev/rest/v1/imports/recipients/35"},"inx:files":{"href":"https://magento-dev.api.inxdev.de/magento-dev/rest/v1/imports/recipients/35/files"},"curies":[{"href":"https://apidocs.inxmail.com/xpro/rest/v1/relations/{rel}","name":"inx","templated":true}]}}
        $this->assertEquals(201,$response);

        var_dump($response);
    }
}