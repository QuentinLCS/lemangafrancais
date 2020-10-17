<?php


namespace App\Listener;


use App\Entity\News;
use App\Entity\Utilisateur;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber
{

    /**
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * @var UploaderHelper
     */
    private $uploaderHelper;

    public function __construct(CacheManager $cacheManager, UploaderHelper $uploaderHelper)
    {

        $this->cacheManager = $cacheManager;
        $this->uploaderHelper = $uploaderHelper;
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public function getSubscribedEvents()
    {
        return [
            'preRemove',
            'preUpdate'
        ];
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Utilisateur) {
            if ($entity->getUtiAvatarFichier() instanceof UploadedFile)
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'utiAvatarFichier'));
        }
        elseif ($entity instanceof News){
            if($entity->getNewsPhotoFichier() instanceof UploadedFile)
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'newsPhotoFichier'));
        }
        else
            return;

    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Utilisateur) {
            if ($entity->getUtiAvatarFichier() instanceof UploadedFile)
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'utiAvatarFichier'));
        }
        elseif ($entity instanceof News){
            if($entity->getNewsPhotoFichier() instanceof UploadedFile)
                $this->cacheManager->remove($this->uploaderHelper->asset($entity, 'newsPhotoFichier'));
        }
        else
            return;
    }
}