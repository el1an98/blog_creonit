<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
/**
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"title": "start"})
 * @ORM\Entity(repositoryClass=PostRepository::class)
 *
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(
     * message="Значение не должно быть пустым"
     *)
     * @Assert\Length(
     *     min=3,
     *     max=30,
     *     minMessage = "Минимальное количество символов в заголовке - {{ limit }}.",
     *     maxMessage = "Максимальное количество символов в заголовке - {{ limit }}.",
     * )
     * @ORM\Column(type="string", length=30)
     */
    private $title;

    /**
     * @Assert\NotBlank(
     * message="Значение не должно быть пустым"
     *)
     * @Assert\Length(
     *     min=50,
     *     max=300,
     *     minMessage = "Минимальное количество символов в содержании - {{ limit }}.",
     *     maxMessage = "Максимальное количество символов в содержании - {{ limit }}.",
     * )
     * @ORM\Column(type="text", length=300)
     */
    private $content;

    /**
     * @Assert\Count(
     *      min = 1,
     *      max = 5,
     *      minMessage = "Нужно указать хотя бы 1 тег.",
     *      maxMessage = "Максимальное количество тегов - {{ limit }}."
     * )
     *  @Assert\All({
     *     @Assert\NotBlank(
     *      message="Значение не должно быть пустым"
     *      ),
     *
     *     @Assert\Length(
     *     min=3,
     *     max=30,
     *     minMessage = "Минимальное количество символов в теге - {{ limit }}.",
     *     maxMessage = "Максимальное количество символов в теге - {{ limit }}.",
     * )
     * })
     * @ORM\Column(type="array")
     */
    private $tags;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

}
