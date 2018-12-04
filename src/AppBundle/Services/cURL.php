<?php

/**
 *
 * @author IBM THINK PAD T450
 *
 * $curl = new cURL();
 * $response = $curl->get('https://jsonplaceholder.typicode.com/todos/',['p' => 'n']);
 * var_dump($response);
 *
 */

namespace AppBundle\Services;

class cURL
{
    
    /**
     * The cURL resource.
     */
    protected $ch;
    
    
    /**
     * The response body.
     *
     * @var string
     */
    public $response;
    
    
    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    
    /**
     * @param string $body
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }
    
    /**
     * Handle dynamic calls to the class.
     *
     * @param  string $func
     * @param  array  $args
     *
     * @return mixed
     */
    public function __call($func, $args)
    {
        $this->ch = curl_init();
        
        if(isset($args[1]))
            $args[0] = $args[0].'?'.http_build_query($args[1]);
            
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->ch, CURLOPT_HEADER, true);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($this->ch, CURLOPT_URL, $args[0]);
            
            //var_dump($args[0]);
            //exit;
            try {
                
                $result = curl_exec($this->ch);
                
                if ($result === false) {
                    curl_close($this->ch);
                    throw new \Exception(curl_error($this->ch), curl_errno($this->ch));
                    
                    
                }
                
            } catch(\Exception $e) {
                trigger_error(sprintf( 'Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);  
            }
            
            
            $headerSize = curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
            $body = substr($result, $headerSize);
            
            curl_close($this->ch);
            
            $this->setBody($body);
            
            return $this;
            
    }
    
    
    /**
     * Convert the response instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return json_decode($this->response);
    }
    
    /**
     * Convert the response object to a JSON string.
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
    
    /**
     * Convert the object to its string representation by returning the body.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->body;
    }
}
