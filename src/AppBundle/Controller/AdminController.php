<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Song;
use AppBundle\Entity\Tag;
use function array_key_exists;
use function explode;
use function fopen;
use function fwrite;
use function implode;
use function move_uploaded_file;
use function print_r;
use function strval;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use const UPLOAD_ERR_INI_SIZE;
use function var_dump;

class AdminController extends Controller
{

    /**
     * @Route(path="/admin", name="get_admin_page")
     */
    public function getAdminPage()
    {
        return $this->render('default/admin.html.twig');
    }

    /**
     * @Route(path="/admin/new_song", name="admin_page_new_song")
     */
    public function newSong(Request $request)
    {



        $dbManager = $this->getDoctrine()->getManager();
        $songRepository = $this->getDoctrine()->getRepository(Song::class);
        $tagRepository = $this->getDoctrine()->getRepository(Tag::class);

        $song = new Song();
        $song->setName($request->get("name"));
        $song->setAuthor($request->get("group"));
        $song->setAlbum($request->get("album"));
        $song->setLyrics($request->get("lyrics"));
        $song->setRating($request->get("rating"));

        $tagsStr = $request->get("tags");

        $tagsNames = explode(' ', $tagsStr);

        $tags = [];

        foreach ($tagsNames as $tagName) {
            $tag = new Tag();
            $tag->setName($tagName);
            $tag->setSearchCount(0);
            $dbManager->persist($tag);

            $tags[] = $tag;
        }

        $song->addTags($tags);

        $songName = $song->getName();


        $local_uploads_dir = 'thumbnails/songs';
        $uploads_dir = '/home/dzzirt/Documents/PhpProjects/musery-webservice/web/' . $local_uploads_dir;

        $destination = "$uploads_dir/$songName";
        $localDestination = "$local_uploads_dir/$songName";

        if (array_key_exists("thumbnail", $_FILES) && $_FILES["thumbnail"]["error"] == UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $destination);
        }


        $song->setImagePath($localDestination);

        $dbManager->persist($song);
        $dbManager->flush();

        print_r($request->get("rating"));
        return new Response();
    }
}