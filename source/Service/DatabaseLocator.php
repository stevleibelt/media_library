<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Service;

use Database\Media\Artist;
use Database\Media\ArtistQuery;
use Database\Media\Audio;
use Database\Media\AudioQuery;
use Database\Media\Audio\Track;
use Database\Media\Audio\TrackQuery;
use Database\Media\Book;
use Database\Media\BookQuery;
use Database\Media\Comment;
use Database\Media\CommentQuery;
use Database\Media\Distributor;
use Database\Media\DistributorQuery;
use Database\Media\Edition;
use Database\Media\EditionQuery;
use Database\Media\Game;
use Database\Media\GamePlatform;
use Database\Media\GamePlatformQuery;
use Database\Media\GameQuery;
use Database\Media\Genre;
use Database\Media\Language;
use Database\Media\LanguageQuery;
use Database\Media\Media;
use Database\Media\MediaQuery;
use Database\Media\MediaToArtist;
use Database\Media\MediaToArtistQuery;
use Database\Media\MediaToGenre;
use Database\Media\MediaToGenreQuery;
use Database\Media\MediaToLanguage;
use Database\Media\MediaToLanguageQuery;
use Database\Media\Type;
use Database\Media\TypeQuery;
use Database\Media\Video;
use Database\Media\VideoQuery;
use Database\User\User;
use Database\User\UserQuery;

/**
 * Class DatabaseLocator
 * @package Service
 */
class DatabaseLocator
{
    //media section
    /**
     * @return Artist
     */
    public function createArtist()
    {
        return new Artist();
    }

    /**
     * @return ArtistQuery
     */
    public function createArtistQuery()
    {
        return ArtistQuery::create();
    }

    /**
     * @return Audio
     */
    public function createAudio()
    {
        return new Audio();
    }

    /**
     * @return AudioQuery
     */
    public function createAudioQuery()
    {
        return AudioQuery::create();
    }

    /**
     * @return Book
     */
    public function createBook()
    {
        return new Book();
    }

    /**
     * @return BookQuery
     */
    public function createBookQuery()
    {
        return BookQuery::create();
    }

    /**
     * @return Comment
     */
    public function createComment()
    {
        return new Comment();
    }

    /**
     * @return CommentQuery
     */
    public function createCommentQuery()
    {
        return CommentQuery::create();
    }

    /**
     * @return Distributor
     */
    public function createDistributor()
    {
        return new Distributor();
    }

    /**
     * @return DistributorQuery
     */
    public function createDistributorQuery()
    {
        return DistributorQuery::create();
    }

    /**
     * @return Edition
     */
    public function createEdition()
    {
        return new Edition();
    }

    /**
     * @return EditionQuery
     */
    public function createEditionQuery()
    {
        return EditionQuery::create();
    }

    /**
     * @return GamePlatform
     */
    public function createGamePlatform()
    {
        return new GamePlatform();
    }

    /**
     * @return GamePlatformQuery
     */
    public function createGamePlatformQuery()
    {
        return GamePlatformQuery::create();
    }

    /**
     * @return Game
     */
    public function createGame()
    {
        return new Game();
    }

    /**
     * @return GameQuery
     */
    public function createGameQuery()
    {
        return GameQuery::create();
    }

    /**
     * @return Genre
     */
    public function createGenre()
    {
        return new Genre();
    }

    /**
     * @return GameQuery
     */
    public function createGenreQuery()
    {
        return GameQuery::create();
    }

    /**
     * @return Language
     */
    public function createLanguage()
    {
        return new Language();
    }

    /**
     * @return LanguageQuery
     */
    public function createLanguageQuery()
    {
        return LanguageQuery::create();
    }

    /**
     * @return Media
     */
    public function createMedia()
    {
        return new Media();
    }

    /**
     * @return MediaQuery
     */
    public function createMediaQuery()
    {
        return MediaQuery::create();
    }

    /**
     * @return MediaToArtist
     */
    public function createMediaToArtist()
    {
        return new MediaToArtist();
    }

    /**
     * @return MediaToArtistQuery
     */
    public function createMediaToArtistQuery()
    {
        return MediaToArtistQuery::create();
    }

    /**
     * @return MediaToGenre
     */
    public function createMediaToGenre()
    {
        return new MediaToGenre();
    }

    /**
     * @return MediaToGenreQuery
     */
    public function createMediaToGenreQuery()
    {
        return MediaToGenreQuery::create();
    }

    /**
     * @return MediaToLanguage
     */
    public function createMediaToLanguage()
    {
        return new MediaToLanguage();
    }

    /**
     * @return MediaToLanguageQuery
     */
    public function createMediaToLanguageQuery()
    {
        return MediaToLanguageQuery::create();
    }

    /**
     * @return Track
     */
    public function createTrack()
    {
        return new Track();
    }

    /**
     * @return TrackQuery
     */
    public function createTrackQuery()
    {
        return TrackQuery::create();
    }

    /**
     * @return Type
     */
    public function createType()
    {
        return new Type();
    }

    /**
     * @return TypeQuery
     */
    public function createTypeQuery()
    {
        return TypeQuery::create();
    }

    /**
     * @return Video
     */
    public function createVideo()
    {
        return new Video();
    }

    /**
     * @return VideoQuery
     */
    public function createVideoQuery()
    {
        return VideoQuery::create();
    }

    //user section
    /**
     * @return User
     */
    public function createUser()
    {
        return new User();
    }

    /**
     * @return UserQuery
     */
    public function createUserQuery()
    {
        return UserQuery::create();
    }
}