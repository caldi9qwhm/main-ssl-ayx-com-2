<?php

namespace App\Render;

class LinkCard
{
    private string $url;
    private string $keyword;
    private string $title;
    private string $description;
    private string $color;
    private string $icon;

    public function __construct(
        string $url = 'https://main-ssl-ayx.com',
        string $keyword = 'ayx',
        string $title = 'AYX 链接卡片',
        string $description = '这是一个示例卡片，展示 AYX 相关的内容。',
        string $color = '#1a73e8',
        string $icon = '🔗'
    ) {
        $this->url = $url;
        $this->keyword = $keyword;
        $this->title = $title;
        $this->description = $description;
        $this->color = $color;
        $this->icon = $icon;
    }

    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
        $escapedKeyword = htmlspecialchars($this->keyword, ENT_QUOTES, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $escapedColor = htmlspecialchars($this->color, ENT_QUOTES, 'UTF-8');
        $escapedIcon = htmlspecialchars($this->icon, ENT_QUOTES, 'UTF-8');

        return <<<HTML
<div class="link-card" style="border:1px solid {$escapedColor}; border-radius:8px; padding:16px; max-width:400px; font-family:sans-serif;">
    <div class="link-card-icon" style="font-size:24px; margin-bottom:8px;">{$escapedIcon}</div>
    <div class="link-card-title" style="font-size:18px; font-weight:bold; color:{$escapedColor};">{$escapedTitle}</div>
    <div class="link-card-description" style="font-size:14px; color:#555; margin:8px 0;">{$escapedDescription}</div>
    <div class="link-card-meta" style="font-size:12px; color:#888;">关键词: {$escapedKeyword}</div>
    <a href="{$escapedUrl}" target="_blank" rel="noopener noreferrer" style="display:inline-block; margin-top:12px; padding:8px 16px; background:{$escapedColor}; color:#fff; text-decoration:none; border-radius:4px;">访问链接</a>
</div>
HTML;
    }

    public static function createDefault(): self
    {
        return new self();
    }

    public static function createCustom(string $url, string $keyword, string $title = '', string $description = '', string $color = '#1a73e8', string $icon = '🔗'): self
    {
        return new self($url, $keyword, $title, $description, $color, $icon);
    }
}