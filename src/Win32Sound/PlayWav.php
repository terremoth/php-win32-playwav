<?php

namespace Win32Sound;

use FFI;
use Exception;

class PlayWav
{
    private const SND_ASYNC = 0x0001;
    private const SND_FILENAME = 0x20000;
    private const SND_LOOP = 0x0008;

    private int $props = 0x0000;
    private FFI $ffi;

    /**
     * @throws Exception
     */
    public function __construct(private string $file)
    {
        if (!file_exists($this->file)) {
            throw new Exception('Error: File ' . $this->file . ' does not exists.');
        }

        $this->ffi = FFI::cdef("int PlaySound(const char *pszSound, void *hmod, int fdwSound);", "winmm.dll");
        $this->props |= self::SND_FILENAME;
    }

    public function async(): PlayWav
    {
        $this->props |= self::SND_ASYNC;

        return $this;
    }

    public function loop(): PlayWav
    {
        $this->props |= self::SND_LOOP;
        return $this;
    }

    public function play(): PlayWav
    {
        $this->ffi->PlaySound($this->file, null, $this->props);
        return $this;
    }

    public function stop(): PlayWav
    {
        $this->ffi->PlaySound(null, null, 0);
        return $this;
    }
}
