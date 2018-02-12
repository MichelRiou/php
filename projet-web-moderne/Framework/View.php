<?php

namespace m2i\framework;


class View
{
    /**
     * @param string $view
     * @param array $params
     */
    private function getHtmlContent(string $view, array $params)
    {
        // Mise ne tampon de la sortie
        // L'interprétation PHP n'est pas immédiatement envoyée à la réponse HTTP.
        ob_start();
        // Extraction de paramètres
        // chaque clef du tableau associatif est transformé en une variable disponible pour la vue.
        extract($params);
        include ROOT_PATH . "/src/views/${view}.php";
        // Récupération du contenu de la mémoire tampon
        $content = ob_get_clean();  // Differentes fonctions existe
        return $content;
    }

    public function render(string $view, array $params){
        // Récupération du code de la vue
        $viewContent=$this->getHtmlContent($view,$params);
        // Ajout de viewContent aux paramètres
        $params["viewContent"]= $viewContent;

        // Insertion de viezContenet dans le layout
        return $this->getHtmlContent("layout",$params);

    }

}