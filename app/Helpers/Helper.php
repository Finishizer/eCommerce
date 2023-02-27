<?php

if (!function_exists('theme')) {
    function theme($key,$default=''): string
    {
        $styles = [
            'theme'=>'dark',
            'mode'=>'dark-mode',
            'bg' => 'dark:bg-gray-700',
            'text' => 'text-white-50',
        ];

        if (is_array($key)){
            $st='';
            foreach ($key as $k){
                $st.=$styles[$k].' ';
            }
            return $st;
        }
        return $styles[$key]??$default;
    }
}

if (!function_exists('allStyles')) {
    function allStyles()
    {

        if (session()->has('all_styles')) {
            return session()->get('all_styles');
        } else {
//            $all_styles = SmStyle::where('school_id', 1)->where('active_status', 1)->get();
//            session()->put('all_styles', $all_styles);

            return session()->get('all_styles');
        }
    }
}

if (!function_exists('textDirection')) {
    function textDirection()
    {

        if (session()->has('text_direction')) {
            return session()->get('text_direction');
        } else {
            $ttl_rtl = Auth::user()->rtl_ltl;
            session()->put('text_direction', $ttl_rtl);
// return $ttl_rtl;
            return session()->get('text_direction');
        }
    }
}
if (!function_exists('userRtlLtl')) {
    function userRtlLtl()
    {

        if (session()->has('user_text_direction')) {
            return session()->get('user_text_direction');
        } else {
            $school_id = app()->bound('school') ? app('school')->id : 1;
            $user = $user = User::where('role_id', 1)->where('school_id', $school_id)->first();

            $ttl_rtl = $user ? $user->rtl_ltl : 2;
            session()->put('user_text_direction', $ttl_rtl);

            return session()->get('user_text_direction');
        }
    }
}
if (!function_exists('userLanguage')) {
    function userLanguage()
    {
        if (session()->has('user_language')) {
            return session()->get('user_language');
        } else {
            $language = Auth::user()->language;
            session()->put('user_language', $language);

            return session()->get('user_language');
        }
    }
}

if (!function_exists('selectedLanguage')) {
    function selectedLanguage()
    {
        if (session()->has('selected_language')) {
            return session()->get('selected_language');
        } else {
//            $selected_language = Auth::check() ? SmGeneralSettings::where('school_id', Auth::user()->school_id)->first() :
//            DB::table('sm_general_settings')->where('school_id', 1)->first();
//            session()->put('selected_language', $selected_language);

            return session()->get('selected_language');
        }
    }
}

if (!function_exists('getSession')) {
    function getSession()
    {
        if (session()->has('session')) {
            return session()->get('session');
        } else {
//            $selected_language = Auth::check() ? SmGeneralSettings::where('school_id', Auth::user()->school_id)->first() :
//            DB::table('sm_general_settings')->where('school_id', 1)->first();
//            $session = DB::table('sm_academic_years')->where('id', $selected_language->session_id)->first();
//            session()->put('session', $session);

            return session()->get('session');
        }
    }
}


if (!function_exists('fileUpload')) {
    function fileUpload($file, $destination)
    {

        $fileName = "";

        if (!$file) {
            return $fileName;
        }

        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }
        $file->move($destination, $fileName);
        $fileName = $destination . $fileName;
        return $fileName;

    }
}

if (!function_exists('fileUpdate')) {
    function fileUpdate($databaseFile, $file, $destination)
    {

        $fileName = "";

        if ($file) {
            $fileName = fileUpload($file, $destination);

            if ($databaseFile && file_exists($databaseFile)) {

                unlink($databaseFile);

            }
        } elseif (!$file and $databaseFile) {
            $fileName = $databaseFile;
        }

        return $fileName;

    }
}

if (!function_exists('putEnvConfigration')) {
    function putEnvConfigration($envKey, $envValue)
    {

        $value = '"' . $envValue . '"';
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $str .= "\n";
        $keyPosition = strpos($str, "{$envKey}=");

        if (is_bool($keyPosition)) {

            $str .= $envKey . '="' . $envValue . '"';

        } else {
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
            $str = str_replace($oldLine, "{$envKey}={$value}", $str);

            $str = substr($str, 0, -1);
        }

        if (!file_put_contents($envFile, $str)) {
            return false;
        } else {
            return true;
        }

    }
}

