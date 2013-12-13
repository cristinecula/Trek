<?php

namespace Trek;

interface VersionManagerInterface
{
	public function current();
	public function bump($version);
	public function isVersioned();
}