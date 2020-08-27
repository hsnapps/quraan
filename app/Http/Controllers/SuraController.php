<?php

namespace App\Http\Controllers;

use App\Sura;
use Illuminate\Http\Request;

class SuraController extends Controller
{
    public function listSuras(Request $request)
    {
        $lang = $request->has('lang') ? $request->lang :'ar';

        $suras = [];
        foreach (__('suras', [], $lang) as $key => $value) {
            $suras[$key + 1] = $value;
        }
        
        return response()->json($suras);
    }

    public function getVerses(Request $request)
    {
        $lang = $request->has('lang') ? $request->lang :'ar';

        abort_if(!$request->has('sura'), 400, __('errors.missing_sura', [], $lang));
        abort_if($request->sura > 114 || $request->sura < 0, 400, __('errors.invalid_sura_id', [], $lang));

        $where = [
            'lang' => $lang,
            'sura' => $request->sura,
        ];

        if ($request->has('verse')) {
            $where['verse'] = $request->verse;
        }

        $verses = Sura::where($where)
        ->get()
        ->mapWithKeys(function ($item) use ($request) { 
            $verse_text = $item['verse_text'];
            if ($request->has('blank')) {
                if ($request->blank == '1') {
                    $verse_text = str_replace('ُ', '', $verse_text);
                    $verse_text = str_replace('َ', '', $verse_text);
                    $verse_text = str_replace('ِ', '', $verse_text);
                    $verse_text = str_replace('ْ', '', $verse_text);
                    $verse_text = str_replace('ً', '', $verse_text);
                    $verse_text = str_replace('ٌ', '', $verse_text);
                    $verse_text = str_replace('ٍ', '', $verse_text);
                    $verse_text = str_replace('ّ', '', $verse_text);
                }
            }
            return [$item['verse'] => $verse_text];
        })
        ->toArray();
        return response()->json($verses);
    }

    public function find(Request $request)
    {
        $lang = $request->has('lang') ? $request->lang :'ar';

        abort_if(!$request->has('q'), 400, __('errors.missing_sura', [], $lang));

        $q = $request->q;
        $verses = Sura::search($q)
        ->get()
        ->mapWithKeys(function ($item) use($lang) { 
            return [
                'sura' => __('suras', [], $lang)[$item->sura - 1],
                'verse' => $item['verse'],
                'verse_text' => $item['verse_text'],
                'link' => url('api/verses?sura='.$item->sura.'&verse='.$item['verse'].'&lang='.$lang),
            ];
        })
        ->toArray();

        return response()->json($verses);
    }

    public function getAvailableLnaguages(Request $request)
    {
        $lang = $request->has('lang') ? $request->lang :'ar';
        return response()->json(__('langs', [], $lang));
    }
}
