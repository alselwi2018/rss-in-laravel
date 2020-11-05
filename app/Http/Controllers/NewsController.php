<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $error = "";
        $url = "http://feeds.skynews.com/feeds/rss/uk.xml";
       try{
        $xml = simplexml_load_file($url);
        
        for($i = 0; $i <= $xml->channel->item->count(); $i++){
            news::updateOrCreate(['title' => !empty($xml->channel->item[$i]->title)?$xml->channel->item[$i]->title:"",
                                  'link' => !empty($xml->channel->item[$i]->link)?$xml->channel->item[$i]->link:"",
                                  'description' => !empty($xml->channel->item[$i]->description)?$xml->channel->item[$i]->description:"",
                                  'pubdate' => !empty($xml->channel->item[$i]->pubDate)?$xml->channel->item[$i]->pubDate:"",
                                  'media' => !empty($xml->channel->item[$i]->enclosure['url'])?$xml->channel->item[$i]->enclosure['url']:""
                                  ]);
        }
    }catch(\Exception $e){
        $error = $e->getMessage()."at line ".$e->getLine();
    }
        $news  = news::all();
        return view('news',['news'=>$news,'error'=>$error]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        //
    }
}
