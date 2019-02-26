<?php

defined('_JEXEC') or die;

function pagination_list_footer($list)
{
	$html = "<div class=\"pagination\">\n";
	$html .= $list['pageslinks'];
	$html .= "\n<input type=\"hidden\" name=\"" . $list['prefix'] . "limitstart\" value=\"" . $list['limitstart'] . "\" />";
	$html .= "\n</div>";

	return $html;
}

function pagination_list_render($list)
{
	$currentPage = 1;
	$range = 1;
	$step = 5;
	foreach ($list['pages'] as $k => $page)
	{
		if (!$page['active'])
		{
			$currentPage = $k;
		}
	}
	if ($currentPage >= $step)
	{
		if ($currentPage % $step == 0)
		{
			$range = ceil($currentPage / $step) + 1;
		}
		else
		{
			$range = ceil($currentPage / $step);
		}
	}

	$html = '<ul class="pagination-list">';
	$html .= $list['start']['data'];
	$html .= $list['previous']['data'];

	foreach ($list['pages'] as $k => $page)
	{
		if (in_array($k, range($range * $step - ($step + 1), $range * $step)))
		{
			if (($k % $step == 0 || $k == $range * $step - ($step + 1)) && $k != $currentPage && $k != $range * $step - $step)
			{
				$page['data'] = preg_replace('#(<a.*?>).*?(</a>)#', '$1...$2', $page['data']);
			}
		}

		$html .= $page['data'];
	}

	$html .= $list['next']['data'];
	$html .= $list['end']['data'];

	$html .= '</ul>';
	return $html;
}

function pagination_item_active(&$item)
{
	$class = '';

	if ($item->text == JText::_('JLIB_HTML_START'))
	{
		$display = '<i class="fa fa-step-backward"></i>';
	}

	if ($item->text == JText::_('JPREV'))
	{
		$display = '<i class="fa fa-backward"></i>';
	}

	if ($item->text == JText::_('JNEXT'))
	{
		$display = '<i class="fa fa-forward"></i>';
	}

	if ($item->text == JText::_('JLIB_HTML_END'))
	{
		$display = '<i class="fa fa-step-forward"></i>';
	}

	if (!isset($display))
	{
		$display = $item->text;
		$class   = ' class="hidden-xs"';
	}

	return '<li' . $class . '><a title="' . $item->text . '" href="' . $item->link . '" class="pagenav">' . $display . '</a></li>';
}

function pagination_item_inactive(&$item)
{
	if ($item->text == JText::_('JLIB_HTML_START'))
	{
		return '<li class="disabled"><a><i class="fa fa-step-backward"></i></a></li>';
	}

	if ($item->text == JText::_('JPREV'))
	{
		return '<li class="disabled"><a><i class="fa fa-backward"></i></a></li>';
	}

	if ($item->text == JText::_('JNEXT'))
	{
		return '<li class="disabled"><a><i class="fa fa-forward"></i></a></li>';
	}

	if ($item->text == JText::_('JLIB_HTML_END'))
	{
		return '<li class="disabled"><a><i class="fa fa-step-forward"></i></a></li>';
	}

	if (isset($item->active) && ($item->active))
	{
		return '<li class="active hidden-xs"><a>' . $item->text . '</a></li>';
	}

	return '<li class="disabled hidden-xs"><a>' . $item->text . '</a></li>';
}
