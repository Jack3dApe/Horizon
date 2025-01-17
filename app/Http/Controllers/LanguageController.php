<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['en', 'pt'])) { // Verifica se o idioma é suportado
            session(['locale' => $locale]); // Armazena o idioma na sessão
        }
        return redirect()->back(); // Redireciona de volta
    }
}
