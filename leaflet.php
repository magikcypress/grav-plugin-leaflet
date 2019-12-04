<?php namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Data\Data;
use Grav\Common\Page\Page;

class LEafletPlugin extends Plugin
{
	private static $instances = 0;

	private $template_html    = 'plugins/leaflet/leaflet.html.twig';
	private $template_vars    = [];

	public static function getSubscribedEvents()
	{
		return [
			'onPluginsInitialized' => ['onPluginsInitialized', 0]
		];
	}

	public function onPluginsInitialized()
	{
		if ($this->isAdmin()) {
			$this->active = false;
			return;
		}

		$this->enable([
			'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
			'onTwigInitialized'   => ['onTwigInitialized', 0]
		]);
	}

	public function onTwigInitialized()
	{
		$this->grav['twig']->twig()->addFunction(
			new \Twig_SimpleFunction('leaflet', [$this, 'leafletFunction'], ['is_safe' => ['html']])
		);
	}

	public function onTwigTemplatePaths()
	{
		$this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
	}

	public function leafletFunction($params = [])
	{
		$page = $this->grav['page'];

		$this->mergePluginConfig($page, $params);

		$this->template_vars      = [
			'id'        => $this->config->get('id') . '-' . self::$instances,
			'width'     => $this->config->get('width'),
			'w_unit'     => $this->config->get('w_unit'),
			'height'    => $this->config->get('height'),
			'h_unit'    => $this->config->get('h_unit'),
			'class'     => $this->config->get('class'),
			'lat'       => $this->config->get('lat'),
			'lng'       => $this->config->get('lng'),
			'lat_marker'       => $this->config->get('lat_marker'),
			'lng_marker'       => $this->config->get('lng_marker'),
			'zoom'      => $this->config->get('zoom'),
			'address'   => $this->config->get('address'),
			'css_tile_filter'   => $this->config->get('css_tile_filter'),
			'css_tile_filter_value'   => $this->config->get('css_tile_filter_value'),
			'instances' => self::$instances
		];

		$output = $this->grav['twig']->twig()->render($this->template_html, $this->template_vars);

		self::$instances++;

		return $output;
	}

	private function mergePluginConfig(Page $page, $params = [])
	{
		$this->config = new Data((array) $this->grav['config']->get('plugins.leaflet'));

		if (isset($page->header()->leaflet)) {
			if (is_array($page->header()->leaflet)) {
				$this->config = new Data(array_replace_recursive($this->config->toArray(), $page->header()->leaflet));
			} else {
				$this->config->set('enabled', $page->header()->leaflet);
			}
		}

		$this->config = new Data(array_replace_recursive($this->config->toArray(), $params));
	}
}
