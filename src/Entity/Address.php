<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Address.
 *
 * @ORM\Table(name="address")
 *
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer",          nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"address_list_view"})
     */
    private $id;

    /**
     * @var                                      Collection|Order[]
     * @ORM\OneToMany(targetEntity=Order::class, cascade={"persist", "remove"}, mappedBy="address_delivery")
     * @Groups({"address_list_view"})
     */
    private $orderAddressDelivery;

    /**
     * @var                                      Collection|Order[]
     * @ORM\OneToMany(targetEntity=Order::class, cascade={"persist", "remove"}, mappedBy="address_invoice")
     * @Groups({"address_list_view"})
     */
    private $orderAddressInvoice;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="address")
     * @Groups({"address_list_view"})
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity=Manufacturer::class, inversedBy="address")
     */
    private $manufacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="alias",      type="string", length=32, nullable=false)
     * @Groups({"address_list_view"})
     */
    private $alias;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     * @Groups({"list",            "address_list_view"})
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname",   type="string", length=255, nullable=false)
     * @Groups({"address_list_view"})
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname",  type="string", length=255, nullable=false)
     * @Groups({"address_list_view"})
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="address1",   type="string", length=128, nullable=false)
     * @Groups({"address_list_view"})
     */
    private $address1;

    /**
     * @ORM\Column(name="address2",   type="string", length=128, nullable=true)
     * @Groups({"address_list_view"})
     */
    private $address2;

    /**
     * @ORM\Column(name="postcode",   type="string", length=12)
     * @Groups({"address_list_view"})
     */
    private $postcode;

    /**
     * @ORM\Column(name="city",       type="string", length=64)
     * @Groups({"address_list_view"})
     */
    private $city;

    /**
     * @ORM\Column(name="other",      type="string", length=255, nullable=true)
     * @Groups({"address_list_view"})
     */
    private $other;

    /**
     * @ORM\Column(name="phone",      type="string", length=32)
     * @Groups({"address_list_view"})
     */
    private $phone;

    /**
     * @ORM\Column(name="phone_mobile", type="string", length=32)
     * @Groups({"address_list_view"})
     */
    private $phone_mobile;

    /**
     * @ORM\Column(name="vat_number", type="string", length=32, nullable=true)
     * @Groups({"address_list_view"})
     */
    private $vat_number;

    /**
     * @ORM\Column(name="dni",        type="string", length=16, nullable=true)
     * @Groups({"address_list_view"})
     */
    private $dni;

    /**
     * @ORM\Column(name="deleted",    type="boolean", nullable=true)
     * @Groups({"address_list_view"})
     */
    private $deleted;

    /**
     * @ORM\Column(name="date_add",   type="datetime", nullable=false)
     * @Groups({"address_list_view"})
     */
    private $date_add;

    /**
     * @ORM\Column(name="date_upd",   type="datetime", nullable=false)
     * @Groups({"address_list_view"})
     */
    private $date_upd;

    public function __construct()
    {
        $this->orderAddressDelivery = new ArrayCollection();
        $this->orderAddressInvoice = new ArrayCollection();
        $this->date_upd = new \DateTime();
        $this->date_add = new \DateTime();
    }

    /**
     * @return null|string
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     *
     * @return Address
     */
    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param null|string $company
     *
     * @return Address
     */
    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     *
     * @return Address
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     *
     * @return Address
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     *
     * @return Address
     */
    public function setAddress1(string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Manufacturer
     */
    public function getManufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer $manufacturer
     */
    public function setManufacturer(Manufacturer $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return null|string
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @param null|string $address2
     *
     * @return Address
     */
    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     *
     * @return Address
     */
    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Address
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getOther(): ?string
    {
        return $this->other;
    }

    /**
     * @param null|string $other
     *
     * @return Address
     */
    public function setOther(?string $other): self
    {
        $this->other = $other;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return Address
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhoneMobile(): ?string
    {
        return $this->phone_mobile;
    }

    /**
     * @param string $phone_mobile
     *
     * @return Address
     */
    public function setPhoneMobile(string $phone_mobile): self
    {
        $this->phone_mobile = $phone_mobile;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getVatNumber(): ?string
    {
        return $this->vat_number;
    }

    /**
     * @param null|string $vat_number
     *
     * @return Address
     */
    public function setVatNumber(?string $vat_number): self
    {
        $this->vat_number = $vat_number;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDni(): ?string
    {
        return $this->dni;
    }

    /**
     * @param null|string $dni
     *
     * @return Address
     */
    public function setDni(?string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool|null $deleted
     *
     * @return Address
     */
    public function setDeleted(?bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->date_add;
    }

    /**
     * @param \DateTimeInterface $date_add
     *
     * @return Address
     */
    public function setDateAdd(\DateTimeInterface $date_add): self
    {
        $this->date_add = $date_add;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateUpd(): ?\DateTimeInterface
    {
        return $this->date_upd;
    }

    /**
     * @param \DateTimeInterface $date_upd
     *
     * @return Address
     */
    public function setDateUpd(\DateTimeInterface $date_upd): self
    {
        $this->date_upd = $date_upd;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrderAddressDelivery(): Collection
    {
        return $this->orderAddressDelivery;
    }

    public function addOrderAddressDelivery(Order $orderAddressDelivery): self
    {
        if (!$this->orderAddressDelivery->contains($orderAddressDelivery)) {
            $this->orderAddressDelivery[] = $orderAddressDelivery;
            $orderAddressDelivery->setAddressDelivery($this);
        }

        return $this;
    }

    public function removeOrderAddressDelivery(Order $orderAddressDelivery): self
    {
        if ($this->orderAddressDelivery->contains($orderAddressDelivery)) {
            $this->orderAddressDelivery->removeElement($orderAddressDelivery);
            // set the owning side to null (unless already changed)
            if ($orderAddressDelivery->getAddressDelivery() === $this) {
                $orderAddressDelivery->setAddressDelivery(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrderAddressInvoice(): Collection
    {
        return $this->orderAddressInvoice;
    }

    public function addOrderAddressInvoice(Order $orderAddressInvoice): self
    {
        if (!$this->orderAddressInvoice->contains($orderAddressInvoice)) {
            $this->orderAddressInvoice[] = $orderAddressInvoice;
            $orderAddressInvoice->setAddressInvoice($this);
        }

        return $this;
    }

    public function removeOrderAddressInvoice(Order $orderAddressInvoice): self
    {
        if ($this->orderAddressInvoice->contains($orderAddressInvoice)) {
            $this->orderAddressInvoice->removeElement($orderAddressInvoice);
            // set the owning side to null (unless already changed)
            if ($orderAddressInvoice->getAddressInvoice() === $this) {
                $orderAddressInvoice->setAddressInvoice(null);
            }
        }

        return $this;
    }
}
