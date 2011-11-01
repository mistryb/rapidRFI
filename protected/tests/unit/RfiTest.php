<?php
class RfiTest extends CDbTestCase
{
    public function testCRUD()
    {
        //Create New RFI
        $newRfi = new Rfi;
        $newRfiID = '1';
        $newRfi -> setAttributes(
                array(
                    'rfi_id' => $newRfiID,
                    'date_entered' => '2011-10-01 00:00:00',
                    'date_assigned' => '2011-10-02 00:00:00',
                    'date_answered' => '2011-10-03 00:00:00',
                    'date_closed' => '2011-10-04 00:00:00',
                    'assigned_to' => 'Bhavik Mistry',
                )
        );
        $this->assertTrue($newRfi->save(false));
    }
}

