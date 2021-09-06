<?php

namespace extend\Facade;

class Redis
{
    /**
     * 设置缓存
     * @param $key
     * @param $data
     */
	public static function set($key,$data){
		$redis = new \extend\Redis();
		$redis->set($key,$data);
	}

    /**
     * 读取缓存
     * @param $key
     * @return false|mixed|string
     */
	public static function get($key){
		$redis = new \extend\Redis();
		return $redis->get($key);
	}

    /**
     * 写入队列
     * @param $key
     * @param $data
     * @return false|int
     */
	public static function lpush($key,$data){
		$redis = new \extend\Redis();
		return $redis->lpush($key,$data);
	}

    /**
     * 读取队列
     * @param $key
     * @return bool|mixed
     */
	public static function rpop($key): bool
    {
		$redis = new \extend\Redis();
		return $redis->rPop($key);
	}

    /**
     * 清空所有redis数据
     * @return bool
     */
	public static function flushall(): bool
    {
		$redis = new \extend\Redis();
		return $redis->flushall();
	}
}