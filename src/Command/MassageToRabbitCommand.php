<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 16.05.2019
 * Time: 0:29
 */

namespace App\Command;


use OldSound\RabbitMqBundle\RabbitMq\Producer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MassageToRabbitCommand extends Command
{
    //

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:send-m-to-rabbit';
    /**
     * @var Producer
     */
    protected $producer;


    public function __construct(Producer $producer)
    {
        $this->producer = $producer;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:test-consumer')
            ->setDescription('send massage to rabbit')
            ->addArgument('massage', InputArgument::REQUIRED, 'Massage to rabbit.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('massage: '.$input->getArgument('massage'));
        $this->producer->publish($input->getArgument('massage'));
    }
}